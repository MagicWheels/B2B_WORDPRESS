# MAGIC WHEELS WordPress 临时部署计划

日期：2026-05-19  
状态：Railway 预览站已部署  
关联 PRD：`01-需求与PRD\MAGIC-WHEELS-全站PRD.md`

## 1. 当前决策

当前阶段先不购买正式服务器，优先完成一个可访问、可编辑、可演示的 WordPress 临时预览站。

方案口径：

- WordPress 是最终技术栈。
- Railway 可作为短期预览 / staging 环境。
- Cloudflare 免费版后续用于 DNS、SSL、CDN 和缓存，不作为 WordPress 主机。
- 正式主机等页面、内容和客户确认后再决定。

## 2. 为什么可以先用免费 / 低成本方案

现阶段目标不是承接真实业务流量，而是：

- 验证页面结构。
- 验证产品内容和素材呈现。
- 验证 RFQ 表单流程。
- 让用户和客户能通过临时链接看站。
- 在不提前购买正式主机的情况下推进建站。

因此可以先用 Railway 等临时环境。

## 3. 为什么 Cloudflare 免费版不能直接当 WordPress 主机

标准 WordPress 需要 PHP + MySQL/MariaDB + 文件上传目录。

Cloudflare 免费版适合：

- DNS。
- SSL。
- CDN。
- 缓存。
- 基础安全。
- 静态页面预览。

Cloudflare 免费版不适合作为：

- 标准 WordPress PHP 运行环境。
- MySQL 数据库主机。
- 长期 WordPress 后台管理环境。

## 4. Railway 临时预览站结构

建议结构：

- `wordpress` 服务：运行 WordPress。
- `MySQL` 服务：保存 WordPress 数据，使用 Railway MySQL 自带数据库卷。
- 免费预览阶段：不额外挂载 `wp-content/uploads`，首批产品图由启动脚本自动补回；正式环境再升级 uploads 持久卷或对象存储。
- Railway 临时域名：`https://wordpress-production-fd52.up.railway.app`。
- 管理员账号：用于后台维护。
- WordPress 后台管理员邮箱：`chloe@shmagicwheels.com`。

当前实际状态（2026-05-19）：

- Railway 项目：`MAGIC-WHEELS-B2B`。
- WordPress 服务：`wordpress`。
- MySQL 服务：`MySQL`。
- GitHub 仓库：`MagicWheels/B2B_WORDPRESS`。
- 部署方式：`railway.json` 指向 `railway/Dockerfile`，首次启动自动安装 WordPress、启用 MAGIC WHEELS 主题、创建基础页面、导入 4 个首批产品和产品图。
- 验证结果：首页、产品列表、MWKE082 产品详情、后台登录页均已通过公网 smoke check。

环境边界：

- 只做 demo / staging。
- 不建议长期正式使用。
- 不承诺生产级稳定性。
- 预览期 RFQ 可先用测试邮箱或关闭真实通知。
- 后续正式上线前必须导出备份并迁移到正式主机。

## 4.1 后台代维护方式

这个项目的 WordPress 后台需要支持代维护，也就是项目执行方可以帮助用户完成日常内容调整。

可代操作内容：

- 上架产品。
- 修改产品参数、卖点和英文描述。
- 上传产品图、详情图、包装图和证书图。
- 调整产品分类、排序和推荐位。
- 编辑页面文案和 CTA。
- 发布 Resources 文章。
- 替换联系方式、二维码、WhatsApp、Tawk.to 等配置。

权限建议：

- 临时预览站可使用管理员账号。
- 正式站建议创建独立账号，例如 `content-admin` 或 `site-ops`。
- 日常内容维护可用 Editor / Shop Manager 类似权限。
- 主题、插件、表单、SEO URL、缓存和安全配置需要管理员权限。

上品方式：

- 首批产品：从已整理 SKU 表和素材目录手动录入，保证字段准确。
- 后续批量产品：优先使用 CSV / 表格导入，或 WordPress REST API / WP-CLI。
- 素材不足产品：先建草稿或隐藏，不作为首页主推。

操作记录：

- 正式站每次批量上品或重要修改，应记录日期、修改范围、涉及页面和待补资料。
- 正式站不直接删除历史素材；无用素材可先归档或取消引用。

## 4.2 主题更新、CLI / API 与视觉验收

主题和后台维护不只靠手动操作，执行时采用组合方式。

### 主题更新

推荐方式：

- 定制主题代码进入 Git 管理。
- 在本地或临时预览站修改主题模板、样式、区块和 `theme.json`。
- 验证无误后再部署到预览站或正式站。
- 正式站更新前先备份数据库和 `wp-content`。

不推荐：

- 长期直接在 WordPress 后台主题编辑器里改代码。
- 用重度页面搭建器承载核心版式，导致后续难以批量维护。

### 自动化工具

可用工具：

- WP-CLI：主题 / 插件安装更新、媒体导入、内容创建、搜索替换、缓存刷新、迁移检查。
- WordPress REST API：页面、文章、产品、自定义内容和媒体的批量创建与更新。
- CSV / 表格导入：适合批量上品和批量更新产品参数。
- 后台手动操作：适合少量调整、客户可视化确认、表单和插件配置。

### 视觉验收

视觉能力主要用于验收，不作为唯一编辑方式。

检查范围：

- 页面是否贴近 `04-网站UI` 中的 PC / 手机 UI 参考图。
- 桌面端和移动端是否有文字溢出、遮挡、错位。
- 产品图比例、清晰度、留白和 CTA 是否正常。
- Header、Footer、RFQ 表单、悬浮联系入口是否可用。
- 主题或插件更新后是否造成版式回退。

## 5. 当前资料是否足够

足够开始 WordPress 建站。

已可用：

- 全站 PRD。
- WordPress 页面结构。
- UI 方向和已生成参考图。
- 产品资料、SKU、参数和首版英文内容。
- MWKE082 / TNT Scooter 素材。
- MWTP001 / TOP TNT Scooter 素材。
- MWKE005 / 12V Bubble Scooter 素材。
- Excel 嵌入图片、证书截图、包装 / PDQ 参考素材。
- Resources 首批内容方向。

不阻塞开发、但后续需补：

- RFQ 接收邮箱。
- WordPress 后台管理员邮箱：已提供 `chloe@shmagicwheels.com`。
- WhatsApp 号码。
- WeChat QR。
- 英文地址。
- Tawk.to 账号或脚本。
- INLINE Scooter 完整素材。
- 工厂高清图。
- 工厂验厂视频。
- 产品视频。

## 6. 执行阶段

### 阶段 A：本地 WordPress 开发

目标：

- 建立 WordPress 项目。
- 创建 MAGIC WHEELS 定制主题。
- 建立页面模板、产品模板、Resources 模板和 RFQ 模板。
- 建立产品内容模型。

交付：

- 本地可访问的 WordPress 站点。
- 后台可维护产品、页面和文章。

### 阶段 B：内容与素材导入

目标：

- 导入首页、Products、Solutions、OEM/ODM、Quality、Factory、About、Resources、RFQ/Contact。
- 导入首期 SKU 和已归档产品素材。
- 设置占位联系方式和可替换字段。

交付：

- 完整首版页面内容。
- 可替换的联系模块。
- 可编辑的 SEO 字段。

### 阶段 C：Railway 临时预览

目标：

- 部署 WordPress + MySQL。
- 生成临时预览链接。
- 验证前台页面、后台编辑、媒体显示和移动端。

交付：

- Railway 临时预览站：`https://wordpress-production-fd52.up.railway.app`。
- 测试账号：后台用户名 `magicwheels_admin`，密码不写入仓库。
- 当前缺口清单。

### 阶段 D：正式上线准备

触发条件：

- 用户确认页面和内容。
- 客户确认联系方式。
- 正式主机方案确定。

需要补齐：

- RFQ 接收邮箱。
- WhatsApp。
- WeChat QR。
- 英文地址。
- 正式域名解析权限。
- 正式主机。

### 阶段 E：正式上线

目标：

- 迁移 WordPress 到正式主机。
- 接入 `magicwheels.net`。
- 接入 Cloudflare 免费版 DNS / SSL / CDN。
- 配置表单真实通知。
- 配置备份、缓存和基础安全。

交付：

- 正式线上 WordPress 官网。
- 可编辑后台。
- 可用 RFQ 表单。
- 基础 SEO 和移动端通过检查。

## 7. 当前下一步

下一步应进入 WordPress 实施准备：

1. 确定本地 WordPress 开发方式。
2. 建立项目文件结构。
3. 输出主题结构和内容模型。
4. 开始首页、产品页、RFQ 页模板实现。
5. 在 Railway 临时部署前完成本地首轮验证。
