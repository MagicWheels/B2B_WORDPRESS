# MAGIC WHEELS 并行线程上下文

更新时间：2026-05-20  
用途：给新开的 Codex / ChatGPT / 开发线程快速接上下文，避免依赖聊天记录。

## 1. 项目一句话

MAGIC WHEELS 是一个面向海外 B2B 买家的儿童滑板车 WordPress 独立站项目。当前阶段不是正式生产上线，而是 Railway 免费/低成本预览站，用来验证页面结构、产品内容、后台可维护性和 RFQ 流程。

## 2. 重要路径

项目根目录：

`C:\Users\MagicArt\Desktop\B端独立站建站`

WordPress 代码目录，也是 GitHub 仓库目录：

`C:\Users\MagicArt\Desktop\B端独立站建站\09-WordPress建站`

核心文档：

- `01-需求与PRD\MAGIC-WHEELS-全站PRD.md`
- `08-项目管理\MAGIC-WHEELS-WordPress临时部署计划.md`
- `09-WordPress建站\README.md`
- `05-上线配置\联系与上线配置.md`
- `00-项目总览-根目录导航.md`

素材入口：

- `02-产品资料`
- `03-工厂与合规`
- `04-网站UI`
- `资料\已整理素材`
- `07-表格完整导出`

## 3. 当前线上状态

Railway 预览站已部署并在线：

- Site: `https://wordpress-production-fd52.up.railway.app`
- Admin: `https://wordpress-production-fd52.up.railway.app/wp-admin/`
- Railway project: `MAGIC-WHEELS-B2B`
- Railway service: `wordpress`
- Railway database: `MySQL`
- Latest successful Railway deployment ID: `887bfad6-867f-48ec-8113-2960f9fadf2d`
- GitHub repo: `MagicWheels/B2B_WORDPRESS`

后台账号：

- Username: `magicwheels_admin`
- Admin email: `chloe@shmagicwheels.com`
- Password: 不写入文档或仓库。当前密码已由主线程按用户要求重置，向项目负责人索取。

已经验证过：

- 首页可访问。
- `/products/` 产品列表可访问。
- `MWKE082` 产品详情可访问。
- `/wp-admin/` 后台登录页可访问。
- 后台密码已重新设置并用登录流程验证成功。

## 4. 代码状态

WordPress 代码仓库：

`C:\Users\MagicArt\Desktop\B端独立站建站\09-WordPress建站`

远程仓库：

`https://github.com/MagicWheels/B2B_WORDPRESS`

主要实现：

- Custom theme: `wp-content\themes\magic-wheels`
- Core MU plugin: `wp-content\mu-plugins\magic-wheels-core.php`
- Railway config: `railway.json`
- Railway Dockerfile: `railway\Dockerfile`
- Railway startup script: `railway\entrypoint.sh`
- Product seed data: `data\products.json`
- Import scripts: `tools\setup-site.php`, `tools\import-products.php`, `tools\import-featured-images.php`

当前已实现内容：

- WordPress 自定义主题。
- 产品 CPT：`magic_product`。
- 产品分类 taxonomy：`magic_product_category`。
- 案例 CPT：`magic_case`。
- 信任背书 CPT：`magic_trust`。
- RFQ shortcode：`[magic_wheels_rfq]`。
- 首批 4 个产品导入。
- 首批产品图导入。
- 基础页面创建：Solutions、OEM/ODM、Quality & Compliance、Factory、Resources、About、RFQ / Contact、Privacy Policy draft。

## 5. 需要特别注意

1. Railway 线上是预览环境，不是正式生产环境。
2. 本地 Docker 可以停掉，不影响 Railway 线上预览站。
3. Railway 免费预览阶段只让 MySQL 使用持久卷；`wp-content/uploads` 暂时没有额外挂载。首批产品图由启动脚本自动补回。正式上线前应改为 uploads 持久卷或对象存储。
4. 新部署曾遇到 Railway 返回 `Deploys have been paused temporarily`。如果线程要部署，必须先检查 Railway 是否恢复部署能力。
5. 正确后台入口是 `/wp-admin/`。`/backend` 已临时建了一个跳转页，但 canonical 后台路径仍是 `/wp-admin/`。
6. 不要把后台密码、数据库密码、Railway token 写进 GitHub、PRD 或公开上下文文档。
7. 不要用 WordPress 后台主题编辑器长期改代码；主题和 MU plugin 应通过 Git 管理。

## 6. 当前未完成/待补

业务资料待补：

- 正式 RFQ 接收邮箱是否沿用 `chloe@shmagicwheels.com`。
- WhatsApp 号码。
- WeChat QR。
- 英文地址。
- Tawk.to 账号或脚本。
- 工厂高清图。
- 工厂验厂视频。
- 产品视频。
- INLINE Scooter 更完整素材。

技术待补：

- 将 UI 参考图的高级视觉进一步落到 WordPress 主题中。
- 做移动端细节 QA。
- 建立正式 uploads 持久化方案。
- 配置正式域名 `magicwheels.net`。
- 正式上线前配置备份、缓存、安全、SEO、表单通知。

## 7. 并行线程建议

可以拆成这些线程并行：

线程 A：视觉与前端主题

- 目标：把 `04-网站UI` 的 PC/移动端参考图落到 WordPress 主题。
- 主要文件：`wp-content\themes\magic-wheels`。
- 验证：桌面和手机截图、首页/产品页/联系页 smoke check。

线程 B：产品内容与上品

- 目标：整理 SKU、产品参数、产品图、详情文案，批量导入 WordPress。
- 主要文件：`data\products.json`、`tools\import-products.php`、`tools\import-featured-images.php`、`02-产品资料`。
- 验证：产品列表、产品详情、后台产品编辑页。

线程 C：资料补齐与内容写作

- 目标：补 About、Factory、Quality、Resources、OEM/ODM 页面文案。
- 主要文件：`01-需求与PRD`、`03-工厂与合规`、`资料\已整理素材`。
- 验证：页面结构符合 PRD，文案符合 B2B 买家语气。

线程 D：部署与运维

- 目标：Railway 状态、GitHub 同步、正式域名/Cloudflare/持久化方案。
- 主要文件：`railway.json`、`railway\Dockerfile`、`railway\entrypoint.sh`、`08-项目管理\MAGIC-WHEELS-WordPress临时部署计划.md`。
- 验证：Railway deployment success、线上 URL smoke check、后台登录。

线程 E：QA 与回归

- 目标：跨页面、跨设备检查排版、链接、表单、图片、后台维护路径。
- 主要对象：首页、Products、Product detail、Solutions、OEM/ODM、Quality、Factory、About、Resources、RFQ/Contact。
- 验证：问题清单按严重度排序，修复后复测。

## 8. 新线程开工提示词

给新线程可以直接贴：

```text
你接手 MAGIC WHEELS WordPress B2B 独立站项目。先阅读：
C:\Users\MagicArt\Desktop\B端独立站建站\08-项目管理\MAGIC-WHEELS-并行线程上下文.md

然后按你的线程职责继续，不要依赖聊天记录。注意不要提交或写入任何密码、token、数据库凭据。WordPress 代码仓库在：
C:\Users\MagicArt\Desktop\B端独立站建站\09-WordPress建站
```

## 9. 完成工作后的记录规则

每个并行线程完成后，至少回填：

- 改了哪些文件。
- 验证了哪些 URL 或命令。
- 哪些内容还缺素材/账号/确认。
- 是否影响 Railway 部署。
- 是否需要主线程合并或协调冲突。
