# MAGIC WHEELS B2B 独立站全站 PRD

版本：v0.1  
日期：2026-05-18  
状态：访谈收敛版，待用户确认  
技术栈：WordPress  
后续流程：PRD 确认 -> image2 生成 UI 界面图 -> UI 通过 -> WordPress 实施

## 1. 背景与目标

MAGIC WHEELS 需要建设一个面向海外 B2B 买家的独立站。该网站不是零售商城，也不是单纯企业展示册，而是一个用于采购评估、信任建立和 RFQ 询盘转化的 B2B 出口网站。

一期核心目标：

- 展示产品系列、型号和工厂实力。
- 获取高质量 RFQ 询盘。
- 建立品牌、工厂、合规、研发、交付能力的信任。
- 支撑 OEM/ODM 和 KA 大客户开发。
- 为后续 SEO/GEO 内容增长保留结构。

一期主转化路径：

`产品/能力认知 -> 信任建立 -> Request a Quote / RFQ`

一期不依赖 `Download Catalog` 做转化。目录下载可以保留为未来功能或弱入口，但不作为上线阻塞项。

## 2. 需求来源与优先级

主需求基线：

- `需求整理/客户需求文档-MAGIC-WHEELS.md`

补充证据：

- `需求整理/B端网站.xlsx`
- `需求整理/MAGIC-WHEELS-建站资料回填表.xlsx`
- `资料/手册-钧睿国际2023_V1.4.pdf`
- `资料/Links/` 下的产品、工厂、场景图片素材
- 企业微信截图需求记录

当资料之间冲突时，优先级如下：

1. 本 PRD 中已确认的访谈决策。
2. `客户需求文档-MAGIC-WHEELS.md` 中 2026-05-15 后的补充确认。
3. `B端网站.xlsx` 的页面结构和英文文案建议。
4. PDF 手册和图片素材中的产品事实。
5. 回填表中的示例行只作为字段模板，不作为最终客户确认资料。

## 3. 已确认决策

- PRD 范围：输出全站 PRD，而不是只做首页或局部页面。
- 技术栈：WordPress。
- UI 流程：PRD 通过后，先用 image2 做 UI 界面图；UI 通过后再进入 WordPress 实施。
- 产品范围：先以现有 PDF 手册中的型号形成临时首期 SKU 清单，PRD 中标注后续可替换。
- 内容深度：一期不只做结构，也要交付首页、核心内页、PDF 型号产品详情和 Resources 首批内容文案。
- 语言策略：英文上线文案为主；西语只做结构预留和后续翻译范围，不在一期写西语全文。
- 事实背书：有来源的数字和能力可以保守使用；敏感证书、客户、验厂信息只写能力和 Logo 展示，不写不可验证的强承诺。

## 4. 企业与品牌定位

品牌名称：MAGIC WHEELS  
公司名称：SHANGHAI MAGIC WHEELS SPORTING GOODS CO., LTD.  
企业定位：具备自有生产线与工厂能力的儿童滑板车制造商。  
现有线上渠道：暂无明显线上独立站渠道。  
现有域名：`magicwheels.net`

核心定位语：

> MAGIC WHEELS is a compliance-ready kids scooter manufacturer supporting retail programs, importers, distributors, and OEM/ODM brand projects.

采购侧重点：

- 合规开发能力
- OEM/ODM 定制能力
- 独家模具和研发能力
- KA 项目经验
- 旺季交期规划能力
- 包装 / PDQ 支持
- QC 流程和第三方测试支持
- 真实工厂和出口执行能力

## 5. 目标用户

### 5.1 主要用户

1. 海外进口商与分销商  
关注产品系列、MOQ、交期、合规、包装、供货稳定性。

2. 连锁商超和 KA 采购  
关注工厂审核、合规文件、项目管理、旺季交付、PDQ/包装和质量稳定性。

3. OEM/ODM 贴牌品牌  
关注研发打样、模具、定制范围、保密机制、包装与说明书、本地合规支持。

4. 批发商和零售商  
关注产品卖点、价格带、畅销款、最小起订量、交付周期。

### 5.2 目标市场

首期重点市场：

- 北美
- 欧洲
- 中东
- 南美
- 澳新
- 日韩

SEO 内容首批优先北美 KA 采购问题，后续扩展欧盟、日本、LATAM。

## 6. 一期范围

### 6.1 一期必须上线

- WordPress 网站基础架构。
- 英文主站内容。
- 西语 URL/语言扩展结构预留。
- 首页。
- Products 产品中心。
- 产品分类页。
- 产品详情页模板和 PDF 型号临时详情内容。
- Solutions 解决方案。
- OEM/ODM 页面。
- Quality & Compliance 页面。
- Factory 页面。
- Case Studies 页面或预留模块。
- Resources / Blog 知识中心。
- About 页面。
- RFQ / Contact 页面。
- WhatsApp 悬浮入口。
- WeChat QR 展示位。
- Tawk.to 在线客服接入位。
- 邮件表单 / RFQ 表单。
- 基础产品分类和关键词搜索。
- SEO 基础结构，包括 TDK、URL、Schema 基础、文章模板和内链入口。

### 6.2 一期可选但推荐

- 简单询盘自动回复邮件。
- 视频模块，如没有真实视频，先使用可替换占位结构。
- Catalog 下载入口，如资料齐备则弱化展示；如资料未齐，不作为上线阻塞。
- Compliance Documents 申请入口，用于客户索取打码证书或测试报告。

### 6.3 一期不做

- 在线下单。
- 购物车。
- 会员中心。
- 客户登录区。
- 登录后价格。
- 复杂多条件筛选。
- Tidio AI 机器人。
- 强制留资下载 Catalog。
- 公开展示完整敏感证书编号。
- 公开展示客户敏感案例。
- 承诺严格 `Response within 24 hours`。

推荐询盘提交提示：

> Thank you. We have received your request. We'll get back to you shortly.

## 7. 站点信息架构

顶级导航建议：

1. Home
2. Products
3. Solutions
4. OEM/ODM
5. Quality & Compliance
6. Factory
7. Case Studies
8. Resources
9. About
10. RFQ / Contact

移动端导航：

- 使用折叠菜单。
- `Request a Quote` 固定为高优先级按钮。
- WhatsApp 悬浮按钮始终可见，但不能遮挡表单提交按钮。

URL 建议：

- `/`
- `/products/`
- `/products/3-wheel-toddler-scooters/`
- `/products/2-wheel-kids-scooters/`
- `/products/light-up-series/`
- `/products/electric-scooters/`
- `/products/{model-slug}/`
- `/solutions/`
- `/solutions/mass-retail-programs/`
- `/solutions/importers-distributors/`
- `/solutions/brands-odm-development/`
- `/oem-odm/`
- `/quality-compliance/`
- `/factory/`
- `/case-studies/`
- `/resources/`
- `/resources/{article-slug}/`
- `/about/`
- `/contact/`
- `/rfq/`

## 8. 页面需求与首版英文文案

### 8.1 Home

页面目标：

- 第一屏让海外采购马上理解 MAGIC WHEELS 是什么、卖什么、为什么可信、下一步如何询盘。
- 同时兼顾儿童产品的明亮亲和感和 B2B 采购的专业可信感。

模块：

1. Header
2. Hero
3. Shanghai Office + Anhui Factory
4. Why Top Buyers Choose MAGIC WHEELS
5. Core Categories
6. OEM/ODM & R&D Process
7. Audits & Certifications
8. Factory / QC / Packaging Preview
9. Resources Preview
10. Final RFQ CTA

首屏英文文案：

H1:

> MAGIC WHEELS | Compliance-Ready Kids Scooters (OEM/ODM) for Retail Programs

Intro:

> Based in Shanghai, with a fully owned factory in Anhui, MAGIC WHEELS supports buyers with compliance-first development, stable lead-time planning, and in-house R&D for kids scooter programs.

Trust points:

- Since 2009
- 50+ patents
- EN / ASTM compliance support
- Peak-season lead time planning

CTA:

- Request a Quote
- View Models

Shanghai Office + Anhui Factory:

> Shanghai Office - fast communication, program coordination, and documentation support.  
> Anhui Factory - stable production, controlled quality, and peak-season lead-time planning.

Why MAGIC WHEELS:

- Compliance-first development with documentation support for your target market.
- Stable lead time with early planning for retail launch schedules.
- In-house R&D for fast OEM/ODM development cycles.
- KA-ready workflow with milestones, documentation, and project coordination.
- Retail-ready packaging, PDQ support, and CBM optimization.
- Structured QC with incoming checks, in-line control, and final inspection.

Final CTA:

> Tell us your target market, compliance needs, and estimated volume. We will recommend suitable models, customization options, and a lead-time plan.

Button:

> Request a Quote

### 8.2 Products

页面目标：

- 让采购按品类快速了解产品范围。
- 引导进入产品详情或 RFQ。
- 产品数据允许后续替换，不把 PDF 临时型号视作最终冻结清单。

首期分类：

1. 3-Wheel Toddler Scooters
2. 2-Wheel Kids Scooters
3. Light-up Series
4. Electric Scooters
5. Balance Bikes - PDF 中出现，是否作为正式分类需后续确认

产品列表字段：

- Model name
- Model No.
- Category
- Age
- Max weight
- Key features
- Packaging
- CBM
- Compliance notes
- CTA: Request Quote
- CTA: View Details

Products 页面英文文案：

H1:

> Kids Scooter Models for Retail and OEM/ODM Programs

Intro:

> Explore MAGIC WHEELS scooter programs by category. Each model can be evaluated by age range, structure, lighting options, packaging, compliance requirements, and customization needs.

Category card copy:

3-Wheel Toddler Scooters:

> Stable beginner-friendly designs for early riders, with adjustable handlebars, wide decks, and retail-ready packaging options.

2-Wheel Kids Scooters:

> Lightweight scooter options for growing riders, available with folding structures, adjustable height, and wheel variations.

Light-up Series:

> LED wheel and deck-light concepts designed to improve shelf appeal while supporting ODM customization.

Electric Scooters:

> Electric mobility options for kids programs, with speed, battery, range, and target-market compliance reviewed by project.

### 8.3 Product Detail

页面目标：

- 让单品页成为采购评估页，而不是零售详情页。
- 每个产品详情页嵌入 RFQ 或强 CTA。

页面模块：

1. Product hero
2. Key selling points
3. Specification table
4. Compliance / testing note
5. Customization options
6. Packaging and loading
7. MOQ and lead time
8. QA and warranty note
9. Related models
10. RFQ form

通用产品详情英文文案模板：

H1:

> {Product Name} | Model {Model No.}

Intro:

> A buyer-ready kids mobility model for retail, importer, and OEM/ODM programs. Specifications, packaging, and compliance requirements can be aligned with your target market.

Key selling points:

- Designed for category-fit retail programs.
- Customization available for color, graphics, packaging, and documentation.
- Compliance and testing support can be reviewed based on target market.

RFQ CTA:

> Share your target market, estimated volume, and compliance requirements. We will recommend the best configuration and lead-time plan.

### 8.4 Solutions

页面目标：

- 按采购角色和业务场景表达能力，而不是只堆产品。

子页面：

1. For Mass Retail Programs
2. For Importers & Distributors
3. For Brands (ODM Development)

Solutions 总页 H1:

> Scooter Manufacturing Solutions for Retail, Distribution, and ODM Programs

Intro:

> MAGIC WHEELS supports buyers from model selection to compliance review, packaging planning, production coordination, and export execution.

Mass Retail Programs:

> For retail programs, schedule, documentation, packaging, and quality consistency matter as much as the product itself. MAGIC WHEELS supports program planning with compliance-first development, peak-season lead-time coordination, and retail-ready packaging options.

Importers & Distributors:

> For importers and distributors, the priority is a reliable product range, clear specifications, stable lead time, and responsive communication. We help match scooter models to target markets, channel requirements, and expected volume.

Brands / ODM Development:

> For brand programs, MAGIC WHEELS supports concept development, prototyping, tooling coordination, packaging adaptation, and confidentiality-aware project communication.

### 8.5 OEM/ODM

页面目标：

- 明确 MAGIC WHEELS 不是单纯现货供应商，而能支持贴牌、定制和开发。

H1:

> OEM/ODM Kids Scooter Development from Brief to Mass Production

Intro:

> From early concept to prototype, pilot run, and mass production, MAGIC WHEELS supports OEM/ODM scooter programs with in-house R&D, tooling coordination, packaging adaptation, and project documentation.

Process:

1. Brief
2. Concept & Quotation
3. Prototype
4. Pilot
5. Mass Production

Customization checklist:

- Logo placement
- Color and graphics
- LED wheel / deck lighting options
- Structure and material optimization
- Color box, master carton, PDQ / pallet display
- Manuals, labels, barcodes, and documentation

Confidentiality copy:

> Partner information, packaging artwork, project files, and market-specific documents are handled with confidentiality during development and production.

### 8.6 Quality & Compliance

页面目标：

- 让采购看到质量控制和合规支持的机制。
- 证书展示保守，避免公开敏感文件。

H1:

> Quality Control and Compliance Support for Kids Scooter Programs

Intro:

> MAGIC WHEELS supports buyer evaluation with structured inspection workflows, target-market compliance discussion, third-party testing support, and masked documentation when required.

Quality Control:

> Our quality process covers incoming inspection, in-line checks, and final inspection to help maintain consistency during mass production. AQL inspection can be arranged upon request.

Testing & Compliance:

> Product compliance can be reviewed based on your target market, including EN, ASTM, CE, FCC, RoHS, and related requirements where applicable.

Certificates:

> Product test reports can be provided in masked format when available. Factory audit certificates are displayed as trust marks only unless otherwise approved.

Logo wall candidates:

- BSCI
- ISO 9001
- SCAN
- FCCA
- Disney FAMA
- CE
- EN71
- ASTM F963
- FCC
- RoHS
- FSC

注意：上述 Logo 需要客户最终确认真实持有状态、可公开范围和有效期。

### 8.7 Factory

页面目标：

- 证明真实生产能力。
- 展示办公室、工厂、产线、QC、包装、仓储和装柜执行。

H1:

> Shanghai Office. Anhui Factory. One Standard.

Intro:

> MAGIC WHEELS combines Shanghai-based communication and documentation support with factory-side production, QC, packaging, and export execution.

Recommended sections:

- Factory overview
- Production line
- Key process / assembly
- Quality inspection
- Packaging and PDQ support
- Warehouse and container loading
- Factory tour media

Packaging copy:

> We support packaging requirements for retail programs, including color boxes, master cartons, labeling, and PDQ/pallet display solutions. Packaging specifications can be aligned with channel requirements and shipping efficiency goals.

Warehouse copy:

> We coordinate warehousing and container loading with clear packing lists and loading checks to support smooth export execution. Sensitive information on cartons and documents is protected for confidentiality.

### 8.8 Case Studies

页面目标：

- 如有可脱敏案例，用案例建立采购信任。
- 如暂无案例，不阻塞上线，先保留入口或模块。

H1:

> Program Experience for Retail and OEM/ODM Buyers

Intro:

> Selected project examples can be shared in a confidentiality-aware format. Client names, artwork, documents, and sensitive commercial details are masked when needed.

首期案例结构：

- Customer type
- Project background
- Challenge
- Solution
- Result
- Masked supporting media

示例案例卡片：

1. Mass Retail Program  
Challenge: peak-season delivery, compliance review, packaging requirements.  
Solution: lead-time planning, testing support, PDQ packaging coordination.  
Result: buyer-ready program execution with masked documentation.

2. Importer Distribution Program  
Challenge: model selection, target-market compliance, shipment planning.  
Solution: model matching, specification review, carton and CBM planning.  
Result: clearer procurement evaluation and faster RFQ alignment.

3. ODM Brand Development  
Challenge: differentiated scooter concept and packaging adaptation.  
Solution: prototype support, graphics, lighting options, confidentiality-aware development.  
Result: development-ready program for brand evaluation.

### 8.9 Resources

页面目标：

- 承接 SEO/GEO 内容增长。
- 用采购问题型内容吸引北美和后续区域买家。

H1:

> Kids Scooter Procurement Guides and Compliance Resources

Intro:

> Practical guides for buyers evaluating kids scooter manufacturers, OEM/ODM programs, safety standards, quality control, packaging, and lead-time planning.

首批 12 篇文章作为一期内容交付：

1. How to Choose a Reliable Kids Scooter Manufacturer for Retail Programs
2. ASTM & CPSIA Essentials for Importing Kids Scooters into the US
3. 3-Wheel vs 2-Wheel Kids Scooters: Selection Guide for Buyers
4. Light-up Scooters: LED Wheel Options and Durability Considerations
5. MOQ and Lead Time Explained for OEM Kids Scooters
6. Peak Season Planning: How to Secure Lead Time for Retail Launches
7. Quality Control Checklist for Kids Scooters
8. Packaging Guide: Color Box, Master Carton, and CBM Optimization
9. PDQ Display Options for Kids Scooters
10. Common Quality Issues in Kids Scooters and How to Prevent Them
11. OEM vs ODM: Which Model Fits Your Brand Program?
12. EN71 / EN14619 Overview for EU Market Expansion

文章通用 CTA：

> Planning a scooter program? Share your target market, compliance requirements, estimated volume, and timeline. MAGIC WHEELS will help you evaluate suitable models and next steps.

首批文章内容交付标准：

- 每篇文章英文上线稿。
- 每篇包含 SEO Title、Meta Description、H1、H2 结构、正文、FAQ、RFQ CTA。
- 每篇内容聚焦采购决策，不写泛泛品牌宣传。
- 每篇至少关联一个 RFQ 或产品/能力页面入口。

### 8.10 About

页面目标：

- 不写空话，写采购关心的事实。

H1:

> About MAGIC WHEELS

Intro:

> MAGIC WHEELS supports kids scooter programs with manufacturing experience, in-house development capability, compliance-aware project support, and factory-side production coordination.

Recommended content:

- Since 2009
- Shanghai office
- Anhui factory
- Own factory since 2019
- More than 50 patents
- Factory audit certificates
- Product certification support
- On-time delivery and inspection performance, written conservatively

Conservative claims copy:

> Our team supports buyers with product development, compliance documentation, production coordination, and quality control. Performance records and certification documents can be reviewed in a masked or request-based format when applicable.

### 8.11 RFQ / Contact

页面目标：

- 获取高质量询盘。
- 不只收姓名邮箱，而是收采购判断所需信息。

H1:

> Request a Quote

Intro:

> For the fastest quotation, please share your target market, required compliance, estimated volume, and timeline. We will recommend suitable models, customization options, and a lead-time plan.

字段：

- Name
- Email
- WhatsApp / Phone
- Country
- Company Type
- Annual Volume / Target MOQ
- Target Market
- Product Type
- Required Compliance
- Target Price Range
- Timeline
- Customization Needs
- Message
- File upload, optional, for brief or artwork

提交后提示：

> Thank you. We have received your request. We'll get back to you shortly.

自动回复邮件，若一期实现：

Subject:

> We have received your MAGIC WHEELS RFQ

Body:

> Thank you for contacting MAGIC WHEELS. We have received your request and will review your target market, compliance requirements, product type, estimated volume, and timeline. Our team will get back to you shortly.

## 9. 临时首期 SKU 清单

说明：以下 SKU 来自 `资料/手册-钧睿国际2023_V1.4.pdf`，作为首版 PRD 和 UI/页面内容的临时产品资料。客户后续补齐回填表后，应替换为最终 SKU 清单。

| Category | Product Name | Model No. | Key Facts From PDF |
| --- | --- | --- | --- |
| Light-up / 3-Wheel | Electro Light TNT Scooter | MWKE082 | 570x270x620mm, adjustable 620-750mm, age 3+, max 20kg, LED wheels and front plaque, CBM 0.0967 |
| Electric | 6V Electric Bubble Scooter | MWKE005 | 630x340x680mm, adjustable 620-680mm with seat, max speed 3.2km/h, range 40min, 6V4ah battery, age 3+, max 23kg |
| Electric | 360 Spin Wheel | MWE3601 | 690x680x390mm, 12V 7A lead acid battery, max speed 5km/h, range 60min, age 3+, max 30kg |
| 3-Wheel / Toddler | 3 in 1 TNT Scooter | MWKM01 | 610x320x588mm, 120x36mm PU wheels, adjustable seat and T-bar, age 2+, max 50kg |
| 2-Wheel / Light-up | Electro Light Inline Scooter | MWKE06 | 590x350x750mm, adjustable 580-750mm, LED PU 100x24mm wheels, ABEC-5, age 5+, max 100kg |
| Stunt / 2-Wheel | Stunt Scooter | MWKE086 | 700x520x840mm, 110mm aluminum core wheel, 6061 alloy deck, ABEC-9, age 5+, max 100kg |
| 2-Wheel / Light-up | 120mm Light Up Inline Scooter | MWKE081 | 670x350x770mm, adjustable 580-770mm, LED PU 120x32mm wheels, ABEC-5, age 5+, max 100kg |
| Stunt / 2-Wheel | Stunt Scooter | MWKE087 | 700x520x840mm, 110mm neon aluminum wheel, 6061 alloy deck, HIC structure, age 8+, max 100kg |
| Stunt / 2-Wheel | Stunt Scooter | MWKE088 | 720x570x940mm, 120mm EP aluminum high-elastic wheel, SCS structure, age 8+, max 100kg |
| 3-Wheel / Toddler | Preschool Tri-Scooter | MWKE084 | 655x265x690mm, PVC wheels, basket/streamer optional, age 3+, max 20kg |
| 3-Wheel / Toddler | Preschool Tri-Scooter | MWKE085 | 655x265x690mm, deck lights optional, PVC wheels, age 3+, max 20kg |
| Balance Bike | Balance Bike | MWKB001 | 840x375x535mm, 450x30mm PU wheels, nylon frame, adjustable seat, age 3-5, max 30kg |
| Balance Bike | Balance Bike | MWKB002 | 840x375x535mm, 450x30mm PU wheels, nylon frame, adjustable seat, age 3-5, max 30kg |
| Balance Bike | Balance Bike | MWKN002 | 840x375x535mm, 450x30mm PU wheels, nylon frame, adjustable seat, age 3-5, max 30kg |
| Balance Bike | Balance Bike | MWKN003 | 840x375x535mm, 450x30mm EVA wheels, PP + GF frame, adjustable seat, age 3-5, max 30kg |

产品清单风险：

- Balance Bike 出现在 PDF 中，但不在最初产品方向中，需要后续确认是否进入站内正式分类。
- Stunt Scooter 是否作为 Kids 2-Wheel 的子类，还是单独隐藏到产品列表中，需要后续确认。
- PDF 中部分 CBM/装柜量存在文本提取异常，最终页面上线前需人工核对。

## 10. WordPress 功能要求

### 10.1 内容模型

建议 WordPress 后台具备以下内容类型：

- Pages：常规页面。
- Products：产品自定义内容类型。
- Product Categories：产品分类。
- Resources：文章 / 博客。
- Case Studies：案例。
- Certificates / Trust Marks：证书或 Logo 管理。
- RFQ Form Submissions：询盘记录或邮件通知。

### 10.2 产品后台字段

Product 字段：

- Product Name
- Model No.
- Category
- Hero Image
- Gallery
- Short Description
- 3 Key Selling Points
- Product Size
- Adjustable Height
- Wheel Specification
- Material
- Age
- Max Weight
- Battery / Speed / Range, when electric
- Packaging
- CBM
- Loading Quantity
- Compliance Notes
- Customization Options
- MOQ
- Lead Time
- Related Products

### 10.3 表单要求

RFQ 表单需支持：

- 邮件通知到指定邮箱。
- 后台可查看提交记录，若插件方案支持。
- 必填校验。
- 反垃圾机制。
- 成功提示。
- 可选自动回复邮件。
- 可选文件上传。

### 10.4 多语言要求

一期：

- 英文为主站。
- 西语结构预留。

预留范围：

- URL 结构或语言切换位。
- 菜单结构。
- 后台内容字段支持翻译。
- SEO TDK 可翻译。

不包含：

- 一期完整西语文案。
- 一期西语人工校对。

### 10.5 SEO 要求

一期必须具备：

- 可编辑 SEO Title。
- 可编辑 Meta Description。
- 清晰 URL slug。
- 产品、文章、页面之间的内链入口。
- Resources 页面和文章模板。
- 基础 Schema 预留，包括 Organization、Product、Article、FAQ。
- 图片 alt 文本。
- 移动端可访问和可读。

一期不包含：

- 持续发文运营。
- 外链建设。
- 排名承诺。
- 竞品词长期监控。

## 11. 视觉与 UI 要求

UI 图在 PRD 通过后用 image2 生成，生成前不得直接进入页面实现。

视觉方向：

- 明亮
- 多彩
- 温馨亲子
- 有圆角但不过度卡通
- 产品图突出
- B2B 信息层级清晰
- 采购可信，不做零售商城氛围

避免：

- 纯玩具店风格。
- 电商价格卡片。
- 购物车。
- 大量营销空话。
- 过度科技蓝黑风。
- 过度儿童插画导致工厂可信感下降。

首版 UI 图建议至少包含：

1. 首页桌面端长页。
2. 产品分类页桌面端。
3. 产品详情页桌面端。
4. RFQ 页面桌面端。
5. 首页移动端关键屏。

## 12. 素材要求与缺口

已有：

- PDF 产品手册。
- AI 手册源文件。
- 产品图和场景图。
- 工厂或相关图片素材。
- 字体文件。
- 企业微信需求截图。
- 两份 Excel 需求/回填表。

待补：

- 最终产品分类和 SKU 清单。
- 每个 SKU 的最终主图、细节图、包装图。
- 每个 SKU 的最终参数和英文描述。
- 证书真实持有状态、年份/有效期、可公开范围。
- Logo 源文件。
- 品牌色或 VI，如没有则由 UI 阶段建立轻量视觉规范。
- RFQ 接收邮箱。
- WhatsApp 号码。
- WeChat QR 图片。
- Tawk.to 脚本或账号。
- 公司英文地址是否公开。
- 视频素材，如有。
- 可脱敏案例素材，如有。

## 13. 验收标准

PRD 通过标准：

- 全站页面结构清晰。
- 一期范围和非一期范围明确。
- WordPress 技术栈和后台内容模型明确。
- 产品中心使用 PDF 临时 SKU 的策略明确。
- 英文内容交付范围明确。
- 西语预留范围明确。
- 事实背书和敏感信息展示边界明确。
- UI 图和实施阶段边界明确。

UI 图通过标准：

- 首屏清楚表达 MAGIC WHEELS 和 kids scooter manufacturer 定位。
- RFQ 主转化突出。
- 产品、工厂、合规、OEM/ODM 能力都有视觉表达。
- 风格符合明亮、多彩、亲子但专业的 B2B 采购站。
- 桌面和移动端主路径清晰。

WordPress 实施通过标准：

- 所有一期页面可访问。
- RFQ 表单可提交并通知指定邮箱。
- 产品可在后台维护。
- Resources 可发布和编辑。
- 移动端无明显遮挡或布局错乱。
- 基础 SEO 字段可编辑。
- WhatsApp、WeChat、Tawk.to 入口按资料配置。
- 敏感证书/案例不公开暴露。

## 14. 后续执行顺序

1. 用户确认本 PRD。
2. 根据 PRD 用 image2 生成 UI 界面图。
3. 用户确认 UI 方向。
4. 输出 WordPress 页面结构和实施清单。
5. 搭建 WordPress 主题/页面/内容模型。
6. 导入首版英文内容和 PDF 临时 SKU。
7. 配置 RFQ、WhatsApp、WeChat、Tawk.to、SEO。
8. 桌面和移动端测试。
9. 根据客户反馈替换最终 SKU、证书、案例和联系配置。

## 15. 当前结论

MAGIC WHEELS 一期应定义为：

> 一个英文优先、WordPress 驱动的 B2B kids scooter 询盘型独立站。它以 RFQ 转化为核心，用产品系列、工厂实力、合规支持、OEM/ODM 能力、质量控制和采购知识内容建立信任；西语结构预留，持续 SEO 和完整多语内容属于后续扩展。

本 PRD 可以进入用户确认阶段。确认后，下一步是 image2 UI 界面图，而不是直接建站。
