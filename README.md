### 安装:

##### 1.进入项目根目录

>1. `composer install` 
>2. `php yii app`
>3. `php yii serve`

##### 2.访问

>前台访问地址: `http://localhost:8080/`<br/>
>后台访问地址: `http://localhost:8080/admin/`<br/> 
>管理员 帐号 `hehe` 密码 `111111`

##### 3.目录结构

```php
api             api
backend         后台
common          核心
console         命令
database        数据库（迁移 填充）
frontend        前台
plugins         插件
runtime         运行时（日志 缓存等）
tests           测试
vendor          扩展
web             web统一入口（web服务器可只开放该目录,保证安全）
wechat          微信
.env            基本配置文件
helpers         基本工具函数（已自动加载）
```

### 现有功能:
```
* rbac权限管理
* 系统配置,管理员操作日志等
* 文章,单页,评论,弹幕等
* 数据库备份还原
* 国际化 主题 皮肤
* 可拆卸插件
* todo
```

