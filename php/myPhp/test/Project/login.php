<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/7
 * Time: 16:37
 */
//登录模块项目
//账户提交的信息 和 储存的数据是否相同，成功就可以跳转
//使用session，这样用户不用在本网站其他页面再进行登录

/*//管理员表
 编号  int   primary key   auto_increment;
用户名   varchar（20）    not null  unique key;
密码    char(32)//加密后32    not null
//md5加密*/ //md5()直接调用


/*
工具函数
连接函数*/

//登录表单
//data.duibi 表单  账户验证
//|| 判断流程
//||
//判断有没有提交   没有就跳转回去

//接收数据  判断 用户名和密码是否都有 一个为空就跳回去

//验证逻辑
//按照用户名找密码：  用户名不重复 因而是唯一的0