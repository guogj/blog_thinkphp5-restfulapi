
执行sql 
https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/sql.sql


本项目引用Leslin/thinkphp5-restfulapi 接口
实现了接口 增删改查。
路由不明白可以查看thinkphp5_1资源路由文档。
如果有不明白的可以QQ:295719991。交流

备注：blog_thinkphp5-restfulapi
====================

基于ThinkPHP5.1* 基础上开发的一个简单的restful api ，带权限验证等

> ThinkPHP5.1的运行环境要求PHPPHP5.6+以上。

详细开发文档参考 [ThinkPHP5完全开发手册](https://www.kancloud.cn/manual/thinkphp5_1/353946)


## 目录结构

初始的目录结构如下：

~~~
www  WEB部署目录（或者子目录）==
├─application           应用目录
│  ├─common             公共模块目录（可以更改）
│  ├─api                接口目录
│  │  ├─controller      控制器目录
│  │  │     ├─v1        版本1目录
|  |  |     ├─v2        版本2目录
│  │  ├─Api.php         授权基类
│  │  ├─Oauth.php       授权验证
│  │  ├─Send.php        返回格式
│  │  ├─model           模型目录
|  |      ├─model     
│  │  ├─view            视图目录
│  │  └─ ...            更多类库目录
│  │
│  ├─command.php        命令行工具配置文件
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─database.php       数据库配置文件
│
├─public                WEB目录（对外访问目录）
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─thinkphp              框架系统目录
│  ├─lang               语言文件目录
│  ├─library            框架类库目录
│  │  ├─think           Think类库包目录
│  │  └─traits          系统Trait目录
│  │
│  ├─tpl                系统模板目录
│  ├─base.php           基础定义文件
│  ├─console.php        控制台入口文件
│  ├─convention.php     框架惯例配置文件
│  ├─helper.php         助手函数文件
│  ├─phpunit.xml        phpunit配置文件
│  └─start.php          框架入口文件
│
├─extend                扩展类库目录
├─runtime               应用的运行时目录（可写，可定制）
├─vendor                第三方类库目录（Composer依赖库）
├─build.php             自动生成定义文件（参考）
├─composer.json         composer 定义文件
├─LICENSE.txt           授权说明文件
├─README.md             README 文件
├─think                 命令行入口文件
~~~

## 流程

-  router.php中定义了restful资源路由，具体请查看代码。
-  访问相应的url，例如：http://localhost/tp5test/public/index.php/v1/user
-  user控制器是继承了Api类
-  在Api类中，会有方法checkAuth()检测用户是否有权限调用接口
-  checkAuth方法会调用Oauth类中的鉴权，$baseAuth = Factory::getInstance(\app\api\controller\OAuth::class);
-  根据用户端传递过来的app_key获取缓存中的access_token，在进行对比，如果true，则可以调用user中的各种方法，否则返回不能调用原因
-  Oauth类中的具体请看代码
-  生成access_token，缓存access_token等相关逻辑在v1/Token.php代码中，使用的是本地缓存，如果需要使用数据库或者redis请查询相关注释说明
-  api端请求需要在header中进行authentication字段拼接，拼接规则：authentication:USERID base64_encode(appid:accesstoken:uid)
-  uid 就是请求生成token时候返回
## 相关流程截图

### 流程图

![](https://github.com/Leslin/thinkphp5-restfulapi/blob/master/screenshot/accesstoken.png)

### 截图
获取token
![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/获取token.png)
获取Authentication
![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/获取Authentication.png)
插入数据 json数据  
{
    "list": {
        "1": {
            "cid": 1,
            "img_url": 1,
            "news_neme": "张三",
            "content": "张三的歌曲"
        },
        "2": {
            "cid": 1,
            "img_url": 1,
            "news_neme": "历史",
            "content": "历史的歌曲"
        },
        "3": {
            "cid": 1,
            "img_url": 1,
            "news_neme": "是的范德萨",
            "content": "范德萨范德萨"
        },
        "4": {
            "cid": 1,
            "img_url": 1,
            "news_neme": "范德萨范德萨",
            "content": "方法方法发广告呵呵呵"
        }
    }
}

![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/保存新闻1.png)
![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/保存新闻传入json数据2.png)

获取列表数据

![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/获取list.png)
获取分页数据get   可以通过page pageSize 获取分页
![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/分页.png)
通过id查询单条
![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/通过id查询单条.png)
通过id删除新闻
![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/通过id删除新闻.png)
修改.png
![](https://github.com/guogj/blog_thinkphp5-restfulapi/blob/master/screenshot/修改.png)
