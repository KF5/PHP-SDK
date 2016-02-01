<?php
	require_once 'Client.php';
	
//KF云客服事务工单系统APIV2调用示例：
	
//一、设置你的公司的域名、邮箱、密钥或者密码
	$yourDomain='yourdomain';
	$email = 'email@email.com';
	$token='60a0319****7fcdf63461c5ad18106';
	$password = '******';
	
	
//二、实例化调用类
	//$test = new Client($yourDomain, $email);
	
//三、根据你调用不同的API接口，设置不同的访问权限方式
	/* APIV2调用权限分为三种：admin 表示管理员，agent 表示客服，end user 表示普通用户
	 * 
	 * ① 若调用权限为客服及以上的API接口请设置
	 *  $test->setAuth('password', $password);
	 *  
	 * ② 若调用权限为普通用户的API接口请设置
	 * $test->setAuth('token', $token);
	 * 
	 * 注意：两种设置互斥，属性token和password不能同时存在
	 * 
	 */
//四、调用API接口


	$data = '';	
	
//工单（客服）
/* 	 $ids = array('1530','1531');
 */
/* 	$json = array(
			'title'=>'1234456',		
			'comment'=>array('content'=>'this is contentap4/17'),'requester'=>array('email'=>'0001@qq.com','name'=>'winter')
	); */
//	工单列表
//	$data = $test->tickets()->findAll();
//		可以增加分页和每页数量限制参数
//	$page = 2; $perpage = 20;
//	$data = $test->tickets()->findAll($page,$perpage);
//	查看指定工单
//	$data = $test->tickets()->find('1530');
//	查看多个工单
//	$data = $test->tickets()->show_many($ids);
//	创建工单
//	$data = $test->tickets()->create($json);
//  更新指定工单
//	$data = $test->tickets()->update('734',$json);
//  更新多个工单
//	$data = $test->tickets()->update_many($ids,$json);
//  删除指定工单
//	$data = $test->tickets()->delete('1566');
//	删除多个工单
//	$data = $test->tickets()->delete_many($ids);
//  查找指定工单可用的副本用户
//	$data = $test->tickets()->collaborators('19');
//  查找指定工单可用的事务列表
//	$data = $test->tickets()->incidents('19');
//	查找故障类型的工单列表
//	$data = $test->tickets()->problems();
//	查找指定工单的所有回复
//	$data = $test->tickets()->comments('1544');

//工单（普通用户）

//	工单请求列表
//	$data = $test->requests()->findAll();
//	查看特定状态的工单请求列表  'open' 'solved'
//	$data = $test->requests()->findAll('open');
//	查看指定工单请求
//	$data = $test->requests()->find('142');
//	搜索工单请求
//	$data = $test->requests()->search('keyword','solved');
//	创建工单请求create
//	$data = $test->requests()->create($json);
//	回复指定工单
//  $data = $test->requests()->reply('1164',$json);
//  查找指定工单请求的所有回复
//    $data = $test->requests()->comments('1534');
//  查看指定工单的某条回复
//  $data = $test->requests()->comments('1534','4086');

//工单自定义字段

//	工单自定义字段列表
//	$data = $test->fields()->findAll('active');
//	查看指定的自定义字段
//	$data = $test->fields()->find('8');
//	删除指定的自定义字段
//	$data = $test->fields()->delete('8');

//工单查看分类

//	工单查看分类列表
//	$data = $test->views()->findAll();
//	获取指定查看分类
//	$data = $test->views()->find('1164');
// 	获取指定查看分类里的所有工单
// 	$data = $test->views()->tickets(1164);
//	获取指定查看分类的工单个数
//	$data = $test->views()->count(1164);
//	获取多个查看分类的工单个数
// 	$data = $test->views()->count_many($ids);

//用户

//	用户列表	
//	$data = $test->users()->findAll();
// 	获取指定角色的用户列表
//	$data = $test->users()->findAll('end_user');
//  查看指定用户信息
// 	$data = $test->users()->find('733');
// 	查看自己的信息
//	$data = $test->users()->mine();
//	获取多个用户信息
//	$data = $test->users()->show_many($ids);
//	$info = array('name'=>'pencil','email'=>'pen@qq.com');
//	创建用户信息
//	$data = $test->users()->create($info); 
// 	修改用户信息
//	$data = $test->users()->update('1177',$info);
//	搜索用户
//	$data = $test->users()->search('pen');
//	删除用户
// 	$data = $test->users()->delete('734');
//	获取指定用户的工单请求(调用权限 agent)
//	$data = $test->users()->requests('733');
//	查看指定用户所属的所有客服组
//	$data = $test->users()->groups('733');
// 	查看指定用户创建的所有正式文档
//	$data = $test->users()->posts('733');
//	查看指定用户创建的问题
//	$data = $test->users()->questions('733');

//用户自定义字段

//	用户自定义字段列表
//  $data = $test->users()->fields()->findAll();
// 	获取特定状态的自定义字段列表	'active'
//	$data = $test->users()->fields()->findAll('active');
//	查看指定的用户自定义字段
// 	$data = $test->users()->fields()->find('7');
//  删除指定的用户自定义字段
//	$data = $test->users()->fields()->delete('7');

//客服组

//	客服组列表
//	$data = $test->groups()->findAll();
//	查看指定客服组
// 	$data = $test->groups()->find('416');
// 	创建客服组(只能向里面添加角色为客服或者管理员的用户，普通用户不能添加进客服组)
//		$info = array('name'=>'14hour group','agents'=>array('733','1010'));
//	$data = $test->groups()->create($info);
// 	修改客服组
//	$data = $test->groups()->update('424',$info);
//	删除客服组
//	$data = $test->groups()->delete('416');

//公司组织

//	公司组织列表
//	$data = $test->organizations()->findAll();
// 	查看指定公司组织
//	$data = $test->organizations()->find('742');
//	查看指定公司组织下的用户列表
//	$data = $test->organizations()->users('155');
//		$info = array('name'=>'api tet organization update');
//	创建公司组织
//	$data = $test->organizations()->create($info);
//	修改指定公司组织
//	$data = $test->organizations()->update('742',$info);
//	删除指定公司组织
//	$data = $test->organizations()->delete('742');
//	获取指定公司组织的工单请求
//	$data = $test->organizations()->requests('155');

//文档分区

// 	文档分区列表
//	$data = $test->categories()->findAll();
//	查看指定的文档分区信息
//	$data = $test->categories()->find('140');
//	查看指定的文档分区下的所有分类信息
//	$data = $test->categories()->forums('85');
//	$info = array('title'=>'APIV2 olddry','content'=>'this is content yong2');
//	创建文档分区
//	$data = $test->categories()->create($info);
//	修改指定的文档分区
//	$data = $test->categories()->update('138',$info);
// 	删除指定的文档分区
//	$data =$test->categories()->delete('138');

//文档分类

//	文档分类列表
//	$data = $test->forums()->findAll();
//	查看指定的文档分类信息
//	$data = $test->forums()->find('440');
//	查看指定的文档分类下的所有正式文档
//	$data = $test->forums()->posts('438');
// 	创建文档分类
//	$info = array('title'=>'this is title new ','role_view'=>'all',
//			  'content'=>'this is content new ','sort'=>'0');
//	$data = $test->forums()->create('85',$info);
//	修改指定的文档分类
//	$data = $test->forums()->update('470',$info);
//	删除指定的文档分类
//	$data = $test->forums()->delete('470');

//文档

//	所有正式文档列表
//	$data = $test->posts()->findAll();
//	草稿列表
//	$data = $test->posts()->draft();
//	查看指定的文档
//	$data = $test->posts()->find('151');
//	创建文档（标签）（附件）
	$info = array('title'=>'mr black','content'=>'opopopop',
				'is_home'=>true,'is_highlight'=>true,'is_top'=>true,'disable_comments'=>true,
				  'tags'=>array('immoratal'),
				  'upload_token'=>array('00154f57388ef86589b76a23d30cd7f ')
				 );

//	$data = $test->posts()->create('467',$info);
	$info = array('content'=>'tsfsef','tags'=>array('qwer'),'upload_token'=>array('00154f57d1d66bbc27b3d3f28e54714'));
//	修改指定文档
//	$data = $test->posts()->update('333',$info);
// 	删除指定文档
// 	$data = $test->posts()->delete('295');
//	$ids = array('171','178');
// 	查看多个文档信息
//	$data = $test->posts()->show_many($ids);
// 	查看指定文档的所有回复
//	$data = $test->posts()->comments('321');
//	查看指定文档的指定回复
//	$data = $test->posts()->comments('321','340');
//	回复指定文档
//	$info = array('content'=>'view day');
//	$data = $test->posts()->reply('321',$info);
//	搜索文档
//	$data = $test->posts()->search('代理指南');

//社区话题

//	话题列表
//	$data = $test->topics()->findAll();
//	查看指定的话题分类
//	$data = $test->topics()->find('10');
//	查看指定的话题下所有的问题
//	$data = $test->topics()->questions('6');
//	创建话题分类
//	$info = array('title'=>'this is new topic','description'=>'this is description');
//	$data = $test->topics()->create($info);
//	修改指定的话题分类
//	$data = $test->topics()->update('10',$info);
//	删除话题分类
//	$data = $test->topics()->delete('16');

//社区问题
//	问题列表
//	$data = $test->questions()->findAll();
//	查看指定问题
//	$data = $test->questions()->find('7');
//	创建问题
//	$info = array('title'=>'this is new question','content'=>'this is content');
//	$data = $test->questions()->create('10',$info);
//	修改问题
//	$data = $test->questions()->update('30',$info);
//	删除指定问题
// 	$data = $test->questions()->delete('30');
//	查看指定问题的所有回复
//	$data = $test->questions()->comments('7');
//	查看指定问题的指定回复
//	$data = $test->questions()->comments('7','33');
//  回复指定社区问题
//	$info = array('content'=>'thanks!!!');
//	$data = $test->questions()->reply('7',$info);
	
//附件	

	$info = array('upload'=>'C:\Users\Public\Pictures\Sample Pictures\Jellyfish.jpg');
//	上传附件
//	$data = $test->attachments()->upload('shuimu.jpg',$info);
// 	查看指定附件
//	$data = $test->attachments()->find('1951');
//	删除指定附件
//	$data = $test->attachments()->delete('1951');

//导出
//	$info  = array('start_time'=>'12344556','end_time'=>'32423432');
//	$data = $test->exports()->tickets($info);
	
//导入

/* 	$info = array('title'=>'this is import api ticket',
				  'requester_id'=>'2192',
				  'comments'=>array(array('content'=>'test content','author_id'=>'2192'),
									array('content'=>'this is import content','author_id'=>'2192')
								   )
				 ); */	
//	$info = array('title'=>'import posts new','content'=>'this is content','created_at'=>'2015-1-12 13:46');
//	工单导入				
//	$data = $test->imports()->tickets($info);

	print_r($data);