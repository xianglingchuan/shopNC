<?php
defined('InShopNC') or exit('Access Invalid!');
/**
 * 共有语言
 */

/**
 * index
 */
$lang['store_goods_index_store_close']	 		= '您的煤企已关闭';
$lang['store_goods_index_taobao_import']		= '淘宝助理导入';
$lang['store_goods_index_new_goods']			= '新增煤炭';
$lang['store_goods_index_add_goods']			= '发布新煤炭';
$lang['store_goods_index_add_time']				= '发布时间';
$lang['store_goods_index_store_goods_class']	= '本店分类';
$lang['store_goods_index_state']	 			= '状态';
$lang['store_goods_index_show']	 				= '上架';
$lang['store_goods_index_unshow']	 			= '下架';
$lang['store_goods_index_recommend']	 		= '推荐';
$lang['store_goods_index_lock']	 				= '禁售';
$lang['store_goods_index_unlock']	 			= '否';
$lang['store_goods_index_close_reason']			= '违规禁售原因';
$lang['store_goods_close_reason_des']			= '分类或规格信息不符';
$lang['store_goods_index_sort']					= '排序';
$lang['store_goods_index_goods_name']	 		= '煤炭名称';
$lang['store_goods_index_goods_name_help']	 	= '煤炭标题名称长度至少3个字符，最长50个汉字';
$lang['store_goods_index_goods_class']	 		= '煤炭分类';
$lang['store_goods_index_brand']	 			= '煤企';
$lang['store_goods_index_price']	 			= '价格';
$lang['store_goods_index_stock']				= '库存';
$lang['store_goods_index_goods_limit']			= '您已经达到了添加煤炭的上限';
$lang['store_goods_index_goods_limit1']			= '个，如果您想继续增加煤炭，请到“煤企设置”升级煤企等级';
$lang['store_goods_index_pic_limit']			= '您已经达到了图片空间的上限';
$lang['store_goods_index_pic_limit1']			= 'M，如果您想继续增加煤炭，请到“煤企设置”升级煤企等级';
$lang['store_goods_index_time_limit']			= '您已经达到煤企使用期限，如果您想继续增加煤炭，请到“煤企设置”升级煤企等级';
$lang['store_goods_index_no_pay_type']			= '平台还未设置支付方式，请及时与平台联系';
$lang['store_goods_index_color']				= '颜色';
$lang['store_goods_index_size']					= '尺码';
$lang['store_goods_index_left']					= '排序向前';
$lang['store_goods_index_right']				= '排序向后';
$lang['store_goods_index_face']					= '设为封面';
$lang['store_goods_index_insert_editor']		= '插入编辑器';
$lang['store_goods_index_goods_class_null']		= '煤炭分类不能为空';
$lang['store_goods_index_goods_class_error']	= '选择煤炭分类（必须选到最后一级）';
$lang['store_goods_index_goods_name_null']		= '煤炭名称不能为空';
$lang['store_goods_index_store_price_null']		= '煤炭价格不能为空';
$lang['store_goods_index_store_price_error']	= '煤炭价格只能是数字';
$lang['store_goods_index_store_price_interval']	= '煤炭价格必须是0.01~9999999之间的数字';
$lang['store_goods_index_goods_stock_null']		= '煤炭库存不能为空';
$lang['store_goods_index_goods_stock_error']	= '库存只能填写数字';
$lang['store_goods_index_edit_goods_spec']		= '编辑煤炭规格';
$lang['store_goods_index_goods_spec_tip']		= '您最多可以添加两种规格（如：颜色和尺码）规格名称可以自定义<br/>两种规格必须填写完整';
$lang['store_goods_index_no']					= '货号';
$lang['store_goods_index_new_goods_spec']		= '添加新的规格属性';
$lang['store_goods_index_save_spec']			= '保存规格';
$lang['store_goods_index_new_class']			= '新增分类';
$lang['store_goods_index_belong_multiple_store_class']	= '煤炭可以从属于煤企的多个分类之下，煤企分类可以由 "商家中心 -> 煤企 -> 煤企分类" 中自定义';
$lang['store_goods_index_goods_base_info']		= '煤炭基本信息';
$lang['store_goods_index_goods_detail_info']	= '煤炭详情描述';
$lang['store_goods_index_goods_transport']		= '煤炭物流信息';
$lang['store_goods_index_goods_szd']			= '所在地';
$lang['store_goods_index_use_tpl']				= '使用运费模板';
$lang['store_goods_index_select_tpl']			= '选择运费模板';
$lang['store_goods_index_goods_other_info']		= '其他信息';
$lang['store_goods_index_upload_goods_pic']		= '上传煤炭图片';
$lang['store_goods_index_remote_url']			= '远程地址';
$lang['store_goods_index_remote_tip']			= '支持JPEG和静态的GIF格式图片，不支持GIF动画图片，上传图片大小不能超过2M.浏览文件时可以按住ctrl或shift键多选';
$lang['store_goods_index_goods_brand']			= '煤炭煤企';
$lang['store_goods_index_multiple_tag']			= '多个Tag标签请用半角逗号 "," 隔开';
$lang['store_goods_index_store_price']			= '煤炭价格';
$lang['store_goods_index_store_price_help']		= '价格必须是0.01~9999999之间的数字';
$lang['store_goods_index_goods_stock']			= '煤炭库存';
$lang['store_goods_index_goods_stock_checking']	= '商铺库存数量必须为0~999999999之间的整数';
$lang['store_goods_index_goods_stock_help']		= '商铺库存数量必须为0~999999999之间的整数<br/>若启用了库存配置，则系统自动计算煤炭的总数，此处无需卖家填写';
$lang['store_goods_index_goods_pyprice_null']	= '缺少平邮价格';
$lang['store_goods_index_goods_kdprice_null']	= '缺少快递价格';
$lang['store_goods_index_goods_emsprice_error']	= 'EMS价格格式错误';
$lang['store_goods_index_goods_select_tpl']		= '请选择要使用的运费模板';
$lang['store_goods_index_goods_weight_tag']     = '单位：千克(Kg)';
$lang['store_goods_index_goods_transfee_charge']= '运费';
$lang['store_goods_index_goods_transfee_charge_seller']= '卖家承担运费';
$lang['store_goods_index_goods_transfee_charge_buyer']= '买家承担运费';
$lang['store_goods_index_goods_no']				= '商家货号';
$lang['store_goods_index_goods_no_help']		= '商家货号是指商家管理煤炭的编号，买家不可见<br/>最多可输入20个字符，支持输入中文、字母、数字、_、/、-和小数点';
$lang['srore_goods_index_goods_stock_set']		= '库存配置';
$lang['store_goods_index_goods_spec']			= '煤炭规格';
$lang['store_goods_index_open_spec']			= '开启规格';
$lang['store_goods_index_spec_tip']				= '您最多可以添加两种煤炭规格（如：颜色，尺码）如煤炭没有规格则不用添加';
$lang['store_goods_index_edit_spec']			= '编辑规格';
$lang['store_goods_index_close_spec']			= '关闭规格';
$lang['store_goods_index_goods_attr']			= '煤炭属性';
$lang['store_goods_index_goods_show']			= '煤炭发布';
$lang['store_goods_index_immediately_sales']	= '立即发布';
$lang['store_goods_index_in_warehouse']			= '放入仓库';
$lang['store_goods_index_goods_recommend']		= '煤炭推荐';
$lang['store_goods_index_recommend_tip']		= '被推荐的煤炭会显示在煤企首页';
$lang['store_goods_index_goods_desc']			= '煤炭描述';
$lang['store_goods_index_upload_pic']			= '上传图片';
$lang['store_goods_index_spec']					= '规格';
$lang['store_goods_index_edit_goods']			= '编辑煤炭';
$lang['store_goods_index_add_sclasserror']		= '该分类已经选择,请选择其他分类';
$lang['store_goods_index_goods_add_success']	= '煤炭添加成功';
$lang['store_goods_index_goods_add_fail']		= '煤炭添加失败';
$lang['store_goods_index_goods_edit_success']	= '煤炭编辑成功';
$lang['store_goods_index_goods_edit_fail']		= '煤炭编辑失败';
$lang['store_goods_index_goods_del_success']	= '煤炭删除成功';
$lang['store_goods_index_goods_del_fail']		= '煤炭删除失败';
$lang['store_goods_index_goods_unshow_success']	= '煤炭下架成功';
$lang['store_goods_index_goods_unshow_fail']	= '煤炭下架失败';
$lang['store_goods_index_goods_show_success']	= '煤炭上架成功';
$lang['store_goods_index_goods_show_fail']		= '煤炭上架失败';
$lang['store_goods_index_goods_seo_keywords']		    = 'SEO关键字<br/>(keywords)';
$lang['store_goods_index_goods_seo_description']		= 'SEO描述<br/>(description)';
$lang['store_goods_index_goods_seo_keywords_help']		= 'SEO关键字 (keywords) 出现在煤炭详细页面头部的 Meta 标签中，<br/>用于记录本页面煤炭的关键字，多个关键字间请用半角逗号 "," 隔开';
$lang['store_goods_index_goods_seo_description_help']   = 'SEO描述 (description) 出现在煤炭详细页面头部的 Meta 标签中，<br/>用于记录本页面煤炭内容的概要与描述，建议120字以内';
$lang['store_goods_index_goods_del_confirm']			= '您确实要删除该图片吗?';
$lang['store_goods_index_goods_not_add']				= '不能再添加图片';
$lang['store_goods_index_goods_the_same']				= '不能再重复图片';
$lang['store_goods_index_default_album']				= '默认相册';
$lang['store_goods_index_flow_chart_step1']				= '选择煤炭所在分类';
$lang['store_goods_index_flow_chart_step2']				= '填写煤炭详细信息';
$lang['store_goods_index_flow_chart_step3']				= '煤炭发布成功';
$lang['store_goods_index_again_choose_category1']       = '您选择的分类不存在，或没有选择到最后一级，请重新选择分类。';
$lang['store_goods_index_again_choose_category2']       = '您的煤企没有绑定该分类，请重新选择分类。';
$lang['store_goods_add_next']							= '下一步';
$lang['store_goods_step2_image']						= '图片（无图片可不填）';
$lang['store_goods_step2_start_time']					= '发布时间';
$lang['store_goods_step2_hour']							= '时';
$lang['store_goods_step2_minute']						= '分';
$lang['store_goods_step2_goods_form']					= '煤炭类型';
$lang['store_goods_step2_brand_new']					= '全新';
$lang['store_goods_step2_second_hand']					= '二手';
$lang['store_goods_step2_exist_image']					= '已有图片';
$lang['store_goods_step2_exist_image_null']				= '当前无图片';
$lang['store_goods_step2_spec_img_help']				= '支持jpg、jpeg、gif、png格式图片。<br />建议上传尺寸310x310、大小%.2fM内的图片。<br />煤炭详细页选中颜色图片后，颜色图片将会在煤炭展示图区域展示。';
$lang['store_goods_step2_description_one']				= '上传煤炭默认主图，如多规格值时将默认使用该图或分规格上传各规格主图；支持jpg、gif、png格式上传或从图片空间中选择，建议使用<font color="red">尺寸800x800像素以上、大小不超过1M的正方形图片</font>，上传后的图片将会自动保存在图片空间的默认分类中。';

$lang['store_goods_album_climit']						= '您上传图片数达到上限，请升级您的煤企或跟管理员联系';
/**
 * 煤炭发布第一步
 */
$lang['store_goods_step1_search_category']				= '分类搜索：';
$lang['store_goods_step1_search_input_text']			= '请输入煤炭名称或分类属性名称';
$lang['store_goods_step1_search']						= '搜索';
$lang['store_goods_step1_return_choose_category']		= '返回煤炭分类选择';
$lang['store_goods_step1_search_null']					= '没有找到相关的煤炭分类。';
$lang['store_goods_step1_searching']					= '搜索中...';
$lang['store_goods_step1_loading']						= '加载中...';
$lang['store_goods_step1_choose_common_category']		= '您常用的煤炭分类：';
$lang['store_goods_step1_please_select']				= '请选择';
$lang['store_goods_step1_no_common_category']			= '您还没有添加过常用的分类';
$lang['store_goods_step1_please_choose_category']		= '请选择煤炭类别';
$lang['store_goods_step1_current_choose_category']		= '您当前选择的煤炭类别是';
$lang['store_goods_step1_add_common_category']			= '[添加到常用分类]';
$lang['store_goods_step1_max_20']						= '只能添加20个常用分类，请清理不常用或重复的分类。';
$lang['store_goods_step1_ajax_add_class']				= '添加常用分类成功';

/**
 * 煤炭发布第三步
 */
$lang['store_goods_step3_goods_release_success']		= '恭喜您，煤炭发布成功！';
$lang['store_goods_step3_viewed_product']				= '去煤企查看煤炭详情';
$lang['store_goods_step3_edit_product']					= '重新编辑刚发布的煤炭';
$lang['store_goods_step3_more_actions']					= '您还可以:';
$lang['store_goods_step3_continue']						= '继续';
$lang['store_goods_step3_release_new_goods']			= '发布新煤炭';
$lang['store_goods_step3_access']						= '进入';
$lang['store_goods_step3_manage']						= '管理';
$lang['store_goods_step3_choose_product_add']			= '选择煤炭添加申请';
$lang['store_goods_step3_participation']				= '参与平台的';
$lang['store_goods_step3_special_activities']			= '专题活动';

/**
 * 煤企
 */
$lang['store_goods_brand_apply']				= '煤企申请';
$lang['store_goods_brand_name']					= '煤企名称';
$lang['store_goods_brand_my_applied']			= '我申请的';
$lang['store_goods_brand_icon']					= '煤企图标';
$lang['store_goods_brand_belong_class']			= '所属类别';
$lang['store_goods_brand_no_record']			= '没有符合条件的煤企';
$lang['store_goods_brand_input_name']			= '请输入煤企名称';
$lang['store_goods_brand_name_error']			= '煤企名称不能超过100个字符';
$lang['store_goods_brand_icon_null']			= '请上传煤企图标';
$lang['store_goods_brand_edit']					= '编辑煤企';
$lang['store_goods_brand_class']				= '煤企类别';
$lang['store_goods_brand_pic_upload']			= '图片上传';
$lang['store_goods_brand_upload_tip']			= '建议上传大小为88x44的煤企图片。<br />申请煤企的目的是方便买家通过煤企索引页查找煤炭，申请时请填写煤企所属的类别，方便站长归类。在站长审核前，您可以编辑或撤销申请。';
$lang['store_goods_brand_name_null']			= '煤企名称不能为空';
$lang['store_goods_brand_apply_success']		= '保存成功，请等待系统审核';
$lang['store_goods_brand_choose_del_brand']		= '请选择要删除的内容!';
$lang['store_goods_brand_browse']				= '浏览...';
/**
 * 图片上传
 */
$lang['store_goods_upload_pic_limit']			= '您已经达到了图片空间的上限';
$lang['store_goods_upload_pic_limit1']			= 'M，如果您想继续增加煤炭，请到“煤企设置”升级煤企等级';
$lang['store_goods_upload_fail']				= '上传失败';
$lang['store_goods_upload_upload']				= '上传';
$lang['store_goods_upload_normal']				= '普通上传';
$lang['store_goods_upload_del_fail']			= '删除图片失败';
$lang['store_goods_img_upload']					= '图片上传';
/**
 * 相册
 */
$lang['store_goods_album_goods_pic']			= '煤炭图片';
$lang['store_goods_album_select_from_album']	= '从用户相册选择';
$lang['store_goods_album_users']				= '用户相册';
$lang['store_goods_album_all_photo']			= '全部图片';
$lang['store_goods_album_insert_users_photo']	= '插入相册图片';
/**
 * ajax
 */
$lang['store_goods_ajax_find_none_spec']		= '未找到煤炭规格';
$lang['store_goods_ajax_update_fail']			= '更新数据库失败';
/**
 * 淘宝导入
 */
$lang['store_goods_import_choose_file']		= '请选择要上传csv的文件';
$lang['store_goods_import_unknown_file']	= '文件来源不明';
$lang['store_goods_import_wrong_type']		= '文件类型必须为csv,您所上传的文件类型为:';
$lang['store_goods_import_size_limit']		= '文件大小必须为'.ini_get('upload_max_filesize').'以内';
$lang['store_goods_import_wrong_class']		= '请选择煤炭分类（必须选到最后一级）';
$lang['store_goods_import_wrong_class1']	= '该煤炭分类不可用，请重新选择煤炭分类（必须选到最后一级）';
$lang['store_goods_import_wrong_class2']	= '必须选到最后一级';
$lang['store_goods_import_wrong_column']	= '文件内字段与系统要求的字段不符,请详细阅读导入说明';
$lang['store_goods_import_choose']			= '请选择...';
$lang['store_goods_import_step1']			= '第一步：导入CSV文件';
$lang['store_goods_import_choose_csv']		= '请选择文件：';
$lang['store_goods_import_title_csv']		= '导入程序默认从第二行执行导入，请保留CSV文件第一行的标题行，最大'.ini_get('upload_max_filesize');
$lang['store_goods_import_goods_class']		= '煤炭分类：';
$lang['store_goods_import_store_goods_class']	= '本店分类：';
$lang['store_goods_import_new_class']			= '新增分类';
$lang['store_goods_import_belong_multiple_store_class']	= '可以从属于多个本店分类';
$lang['store_goods_import_unicode']			= '字符编码：';
$lang['store_goods_import_file_type']		= '文件格式：';
$lang['store_goods_import_file_csv']		= 'csv文件';
$lang['store_goods_import_desc']			= '导入说明：';
$lang['store_goods_import_csv_desc']		= '1.如果修改CSV文件请务必使用微软excel软件，且必须保证第一行表头名称含有如下项目: 
煤炭名称、煤炭类目、新旧程度、煤炭价格、煤炭数量、有效期、运费承担、平邮、EMS、快递、橱窗推荐、煤炭描述、新图片。<br/>
2.如果因为淘宝助理版本差异表头名称有出入，请先修改成上述的名称方可导入，不区分全新、二手、闲置等新旧程度，导入后煤炭类型都是全新。<br/>
3.如果CSV文件超过'.ini_get('upload_max_filesize').'请通过excel软件编辑拆成多个文件进行导入。<br/>
4.每个煤炭最多支持导入5张图片。';
$lang['store_goods_import_submit']			= '导入';
$lang['store_goods_import_step2']			= '第二步：上传煤炭图片';
$lang['store_goods_import_tbi_desc']		= '请上传与csv文件同级的images目录(或与csv文件同名的目录)内的tbi文件';
$lang['store_goods_import_upload_complete'] = "上传完毕";
$lang['store_goods_import_doing'] 			= "正在导入...";
$lang['store_goods_import_step3']			= '第三步：整理数据';
$lang['store_goods_import_remind']			= '前两步完成后才可进行数据整理，确认整理数据吗';
$lang['store_goods_import_remind2']			= '（如果图片分多次上传，请在所有图片上传完成后整理）';
$lang['store_goods_import_pack']			= '整理数据';
$lang['store_goods_pack_wrong1']			= '请先导入CSV文件';
$lang['store_goods_pack_wrong2']			= '请导入正确的CSV文件';
$lang['store_goods_pack_success']			= '数据整理成功';
$lang['store_goods_import_end']				= '，最后';
$lang['store_goods_import_products_no_import']	= '吨煤炭没有导入';
$lang['store_goods_import_area']			= '所在地：';

/*淘宝文件导入*/
$lang['store_goods_import_upload_album'] = '导入相册选择';

/**
 * ajax修改煤炭标题
 */
$lang['store_goods_title_change_tip']		= '单击修改煤炭标题名称，长度<br/>至少3个字符，最长50个汉字';

/**
 * ajax修改煤炭库存
 */
$lang['store_goods_stock_change_stock']		= '修改库存';
$lang['store_goods_stock_change_tip']		= '单击修改库存';
$lang['store_goods_stock_stock_sum']		= '库存总数';
$lang['store_goods_stock_change_more_stock']= '修改更多的库存信息';
$lang['store_goods_stock_input_error']		= '请填写不小于零的数字!';

/**
 * ajax修改煤炭库存
 */
$lang['store_goods_price_change_price']		= '修改价格';
$lang['store_goods_price_change_tip']		= '单击修改价格';
$lang['store_goods_price_change_more_price']= '修改更多价格信息';
$lang['store_goods_price_input_error']		= '请填写正确的价格！';

/**
 * ajax修改煤炭推荐
 */
$lang['store_goods_commend_change_tip']		= '选择是否作为煤企推荐煤炭';

?>
