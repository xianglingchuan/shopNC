<?php

header("Content-type: text/html; charset=utf-8");

/**
 * SNS我的空间
 *
 * @copyright  Copyright (c) 2007-2013 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
use Shopnc\Tpl;

defined('InShopNC') or exit('Access Invalid!');
include_once 'eSign.php';

class member_contractControl extends BaseMemberControl {

    public function __construct() {
        parent::__construct();

        $member_info = Model('member')->getMemberInfoByID($_SESSION['member_id'], 'member_type');
        if ($member_info['member_type'] != memberModel::TYPE_COMPANY_KEY) {
            $message = "个人用户不能使用网签合同功能!";
            showDialog($message, 'index.php?act=member&op=home', 'error');
            die();
        }
    }

    /**
     * 合同首页
     */
    public function indexOp() {
        $contractModel = Model('eqb_contract');
        $data = $contractModel->getStatistics($_SESSION['member_id']);  //合同统计信息
        Tpl::output('data', $data);
        $this->profile_menu('index');
        Tpl::showpage('member_contract.index');
    }

    /**
     * 发布合同
     */
    public function addOp() {
        header("Content-type: text/html; charset=utf-8");
        $contractModel = Model('eqb_contract');
        $storeList = $contractModel->getStoreList();
        if (chksubmit()) {
            $message = "";
            $title = isset($_POST['title']) && !empty($_POST['title']) ? trim($_POST['title']) : "";
            $description = isset($_POST['description']) && !empty($_POST['description']) ? trim($_POST['description']) : "";
            $storeId = isset($_POST['store_id']) && intval($_POST['store_id']) >= 1 ? intval($_POST['store_id']) : 0;
            $fileObject = $_FILES['contract_file'];
            if (!empty($title) && intval($storeId) >= 1) {
                $storeInfo = $contractModel->getStoreInfo($storeId);
                if (!empty($storeInfo)) {
                    if (!empty($fileObject['name'])) {
                        //获取文件的格式
                        $pathInfo = pathinfo($fileObject['name']);
                        $extensionArray = array("doc", "pdf");
                        if (in_array($pathInfo['extension'], $extensionArray)) {
                            $upload = new UploadFile();
                            $upload->set('default_dir', ATTACH_MALBUM);
                            $upload->set('max_size', 10240);
                            $uploadResult = $upload->upfile2("contract_file");
                            if ($uploadResult) {
                                $filePath = $upload->get("save_path") . DS . $upload->get("file_name");
                                $data = array("title" => $title, "description" => $description, "store_id" => $storeId,
                                    "store_member_id" => $storeInfo['member_id'], "member_id" => $_SESSION['member_id'],
                                    "file_path" => $filePath, "file_path_proto" => $filePath);
                                $result = $contractModel->memberAdd($data);
                                if ($result) {
                                    $message = "操作成功!";
                                } else {
                                    $message = "操作失败!";
                                }
                            } else {
                                $message = "合同文件上传失败!";
                            }
                        } else {
                            $message = "只能上传doc和pdf格式文件!";
                        }
                    } else {
                        $message = "请选择上传合同文件!";
                    }
                } else {
                    $message = "煤企信息不存在!";
                }
            } else {
                $message = "合同标题和煤企为必填项!";
            }
            showDialog($message, 'reload', $result ? 'succ' : 'error');
        }
        Tpl::output('storeList', $storeList);
        $this->profile_menu('add');
        Tpl::showpage('member_contract.add');
    }

    /**
     * 待我签署
     */
    public function waitMeListOp() {
        $contractModel = Model('eqb_contract');
        //读取当前登录用户接受或者发起的合同
        $condition = "eqb_contract.member_id='" . $_SESSION['member_id'] . "' AND eqb_contract.member_signed_status IN(" . eqb_contractModel::MEMBER_SIGNED_STATUS_WAIT_KEY . "," . eqb_contractModel::MEMBER_SIGNED_STATUS_FAIL_KEY . ") "
                . "AND eqb_contract.status NOT IN(" . eqb_contractModel::STATUS_REJECT_KEY . ", " . eqb_contractModel::STATUS_BOTH_SUCCESS_KEY . ", " . eqb_contractModel::STATUS_CLOSE_KEY . ")";
        $list = $contractModel->getList($condition, '', 'eqb_contract.*, member.member_name, store.store_name', '', 'eqb_contract.id');
        Tpl::output('list', $list);
        Tpl::output('show_page', $contractModel->showpage());
        $this->profile_menu('waitme');
        Tpl::showpage('member_contract.waitmelist');
    }

    /**
     * 关闭合同 - 只有自己发启的合同才能被自己关闭
     */
    public function closeOp() {
        $contractModel = Model('eqb_contract');
        $id = isset($_GET['id']) && intval($_GET['id']) >= 1 ? intval($_GET['id']) : 0;
        $message = "";
        $result = false;
        if (intval($id) >= 1) {
            $info = $contractModel->getInfo("id='{$id}'");
            if (intval($info['createuid']) == intval($_SESSION['member_id'])) {
                $result = $contractModel->close($id, $_SESSION['member_id']);
                if ($result) {
                    $message = "关闭合同成功.";
                } else {
                    $message = "关闭合同失败.";
                }
            } else {
                $message = "不能关闭其他人发起的合同.";
            }
        } else {
            $message = "参数错误.";
        }
        showDialog("关闭合同成功.", 'reload', ($result ? 'succ' : 'error'));
    }

    /**
     * 退回合同 - 只有发给自己的合同才有权退回
     */
    public function sendbackOp() {
        $contractModel = Model('eqb_contract');
        $id = isset($_GET['id']) && intval($_GET['id']) >= 1 ? intval($_GET['id']) : 0;
        $message = "";
        $result = false;
        if (intval($id) >= 1) {
            $info = $contractModel->getInfo("id='{$id}'");
            if (intval($info['member_id']) == intval($_SESSION['member_id']) && intval($info['createuid']) != intval($_SESSION['member_id'])) {
                $result = $contractModel->sendback($id, $_SESSION['member_id']);
                if ($result) {
                    $message = "退回合同成功.";
                } else {
                    $message = "退回合同失败.";
                }
            } else {
                $message = "不能非法退回合同.";
            }
        } else {
            $message = "参数错误.";
        }
        showDialog("关闭合同成功.", 'reload', ($result ? 'succ' : 'error'));
    }

    /**
     * 待他人签署
     */
    public function waitOthersListOp() {
        $contractModel = Model('eqb_contract');
        //读取当前登录用户接受或者发起的合同
        $condition = "eqb_contract.member_id='" . $_SESSION['member_id'] . "' AND eqb_contract.store_signed_status IN(" . eqb_contractModel::STORE_SIGNED_STATUS_WAIT_KEY . "," . eqb_contractModel::STORE_SIGNED_STATUS_FAIL_KEY . ") "
                . "AND eqb_contract.status NOT IN(" . eqb_contractModel::STATUS_REJECT_KEY . ", " . eqb_contractModel::STATUS_BOTH_SUCCESS_KEY . ", " . eqb_contractModel::STATUS_CLOSE_KEY . ")";
        $list = $contractModel->getList($condition, '', 'eqb_contract.*, member.member_name, store.store_name', '', 'eqb_contract.id');
        Tpl::output('list', $list);
        Tpl::output('show_page', $contractModel->showpage());
        $this->profile_menu('waitothers');
        Tpl::showpage('member_contract.waitotherslist');
    }

    /**
     * 已完成签署 - 双方签署成功
     */
    public function bothSuccessListOp() {
        $contractModel = Model('eqb_contract');
        $condition = "eqb_contract.member_id='" . $_SESSION['member_id'] . "' AND eqb_contract.store_signed_status='" . eqb_contractModel::STORE_SIGNED_STATUS_SUCCESS_KEY . "' AND eqb_contract.member_signed_status='" . eqb_contractModel::MEMBER_SIGNED_STATUS_SUCCESS_KEY . "' "
                . "AND eqb_contract.status='" . eqb_contractModel::STATUS_BOTH_SUCCESS_KEY . "' ";
        $list = $contractModel->getList($condition, '', 'eqb_contract.*, member.member_name, store.store_name', '', 'eqb_contract.id');
        Tpl::output('list', $list);
        Tpl::output('show_page', $contractModel->showpage());
        $this->profile_menu('bothsuccess');
        Tpl::showpage('member_contract.bothsuccesslist');
    }

    /**
     * 退回的文件 - 对方拒绝签署请求
     */
    public function returnListOp() {
        $contractModel = Model('eqb_contract');
        $condition = " eqb_contract.status='" . eqb_contractModel::STATUS_REJECT_KEY . "' AND eqb_contract.createuid='" . $_SESSION['member_id'] . "' ";
        $list = $contractModel->getList($condition, '', 'eqb_contract.*, member.member_name, store.store_name', '', 'eqb_contract.id');
        Tpl::output('list', $list);
        Tpl::output('show_page', $contractModel->showpage());
        $this->profile_menu('return');
        Tpl::showpage('member_contract.returnlist');
    }

    /**
     * 已关闭 - 关闭合同
     */
    public function closeListOp() {
        $contractModel = Model('eqb_contract');
        $condition = " eqb_contract.status='" . eqb_contractModel::STATUS_CLOSE_KEY . "' AND eqb_contract.createuid='" . $_SESSION['member_id'] . "' ";
        $list = $contractModel->getList($condition, '', 'eqb_contract.*, member.member_name, store.store_name', '', 'eqb_contract.id');
        Tpl::output('list', $list);
        Tpl::output('show_page', $contractModel->showpage());
        $this->profile_menu('close');
        Tpl::showpage('member_contract.closelist');
    }

    /**
     * 合同的详情展示
     */
    public function viewOp() {
        $id = isset($_GET['id']) && intval($_GET['id']) >= 1 ? intval($_GET['id']) : 0;
        $member_menu = isset($_GET['member_menu']) ? trim($_GET['member_menu']) : "";
        if (intval($id) >= 1) {
            $contractModel = Model('eqb_contract');
            $info = $contractModel->getDetailInfo("eqb_contract.id='{$id}'");
            Tpl::output('info', $info);
            $this->profile_menu($member_menu);
            Tpl::showpage('member_contract.view');
        } else {
            $message = "合同ID不合法.";
            showDialog($message, 'reload', 'error');
        }
    }

    /**
     * 签署合同
     */
    public function signContractOp() {
        $id = isset($_GET['id']) && intval($_GET['id']) >= 1 ? intval($_GET['id']) : 0;
        $message = $file_path = $title = "";
        $ret = 0;
        $eSignClass = new eSgin();
        if (intval($id) >= 1) {
            $accountMode = Model('eqb_account');
            //获取用户的扩展信息
            $accountInfo = $accountMode->getMemberExpandInfo($_SESSION['member_id']);
            if (!empty($accountInfo)) {
                $resultAccount = $accountMode->getEsignAccountId($_SESSION['member_id'], $accountInfo);
                $message = $resultAccount['message'];
                $accountId = $resultAccount['accountId'];
                if (empty($message) && intval($accountId) >= 1) {
                    //获取合同文件路径信息
                    $eqbContractModel = Model('eqb_contract');
                    $info = $eqbContractModel->getInfo("id='{$id}'");
                    if (!empty($info)) {
                        $title = $info['title'];
                        $docId = $info['doc_id'];
                        //还需要判断合同文件是否上传了E签宝了........
                        if (intval($info['doc_id']) <= 0) {
                            $file_path = $info['file_path'];
                            if (!empty($file_path)) {
                                $file_path = BASE_PATH . "/../data/upload/" . $file_path;
                                $result = $eSignClass->updateFile($file_path, $title);
                                if ($result['ret'] == 1 && intval($result['doc_id']) >= 1) {
                                    $docId = $result['doc_id'];
                                    $_result = $eqbContractModel->myUpdate("id='{$id}'", array("doc_id" => $result['doc_id']));
                                    if ($_result) {
                                        $ret = 1;
                                        $message = "更新合同文档标记成功!";
                                    } else {
                                        $message = "更新合同文档标记失败!";
                                    }
                                } else {
                                    $message = $result['msg'];
                                }
                            } else {
                                $message = "合同文件不存在!";
                            }
                        } else {
                            $ret = 1;
                            $message = "成功,开始签署文件!";
                        }
                        $customNum = "0_0_0";
                        $member_mobile = "";
                        if (intval($ret)) {
                            $customNum = "{$info['id']}_{$info['member_id']}_0";
                            $memberModel = Model('member');
                            $memberInfo = $memberModel->getInfo($info['member_id']);
                            $member_mobile = $memberInfo['member_mobile'];
                        }
                        $data = array(
                            "redirectUrl" => APP_SITE_URL . $eSignClass::REDIRECTURL,
                            "notifyUrl" => APP_SITE_URL . $eSignClass::NOTIFYURL,
                            "customNum" => $customNum,
                            "signerType" => 1, //手机
                            "signer" => $member_mobile, //用户的手机号
                            "sealType" => 0, //0-实时手绘印章
                            "authType" => "3,4", //身份认证类型，1-手机/验证码验证，2-手机接收授权短信验证，3-邮箱/签署口令，4-手机/签署口令，5-UKEY证书，默认1。支持多种认证类型，多个以“,”隔开
                            "docId" => $docId
                        );
                        Tpl::output('data', $data);
                    } else {
                        $message = "合同信息不存在!";
                    }
                }
            } else {
                $message = "请先完成实名认证信息!";
                showDialog($message, 'index.php?act=member_information&op=certification', 'error');
                die();
            }
        } else {
            $message = "参数错误!";
        }
        Tpl::output('id', $id);
        Tpl::output('ret', $ret);
        Tpl::output('message', $message);
        Tpl::output('title', $title);
        Tpl::showpage('member_contract.uploadfile', 'null_layout');
        die();
    }

    /**
     * 签署合同 - 显示签署页面
     */
    public function signShowFileOp() {
        $data = array(
            "notifyUrl" => urlencode($_POST['notifyUrl']),
            "redirectUrl" => urlencode($_POST['redirectUrl']),
            "signerType"  => $_POST['signerType'],
            "signer" => $_POST['signer'],
            "sealType" => $_POST['sealType'],
            "authType" => $_POST['authType'],
            "docId" => $_POST['docId'],
            "customNum" =>$_POST['customNum']
        );
        $eSignClass = new eSgin();
        $eSignClass->signShowFile($data);
    }

    /**
     * 用户中心右边，小导航
     *
     * @param string 	$menu_key	当前导航的menu_key
     * @return
     */
    private function profile_menu($menu_key = '') {
        $menu_array = array(
            1 => array('menu_key' => 'index', 'menu_name' => "概要统计", 'menu_url' => 'index.php?act=member_contract&op=index'),
            2 => array('menu_key' => 'waitme', 'menu_name' => "待我签署", 'menu_url' => 'index.php?act=member_contract&op=waitMeList'),
            3 => array('menu_key' => 'waitothers', 'menu_name' => "待他人签署", 'menu_url' => 'index.php?act=member_contract&op=waitOthersList'),
            4 => array('menu_key' => 'bothsuccess', 'menu_name' => "已完成签署", 'menu_url' => 'index.php?act=member_contract&op=bothSuccessList'),
            5 => array('menu_key' => 'return', 'menu_name' => '退回文件', 'menu_url' => 'index.php?act=member_contract&op=returnList'),
            6 => array('menu_key' => 'close', 'menu_name' => '已关闭', 'menu_url' => 'index.php?act=member_contract&op=closeList'),
            7 => array('menu_key' => 'add', 'menu_name' => '发起合同', 'menu_url' => 'index.php?act=member_contract&op=add')
        );
        //		if($menu_key == 'sendmsg') {
        //			$menu_array[] = array('menu_key'=>'sendmsg','menu_name'=>Language::get('home_message_send_message'),'menu_url'=>'index.php?act=member_message&op=sendmsg');
        //		}elseif($menu_key == 'showmsg') {
        //			$menu_array[] = array('menu_key'=>'showmsg','menu_name'=>Language::get('home_message_view_message'),'menu_url'=>'#');
        //		}
        Tpl::output('member_menu', $menu_array);
        Tpl::output('menu_key', $menu_key);
    }

}
