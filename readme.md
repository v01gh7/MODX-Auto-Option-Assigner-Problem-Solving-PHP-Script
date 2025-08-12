# ⚡ MODX Auto-Option Assigner — Problem-Solving PHP Script

---

## 📜 Description

**MODX msCategory Auto-Option Assigner** is a **high-performance PHP script** that automatically finds all **used product characteristics (MiniShop2 options)** and assigns them to their corresponding categories.  
This ensures that every option is **visible, editable, and displayed** on the site — **without manual setup**.

✅ Works on **large stores** — tested on projects with **100K+ products, hundreds of categories, and thousands of options**  
✅ No manual category-option linking — **fully automated**  
✅ Keeps existing data intact, only adds missing relations  
✅ Compatible with **MODX Revolution + MiniShop2**  
✅ **Production-tested** on **20+ real-world stores**

---

## 🚨 The Problem

By default in **MiniShop2**, product characteristics (options) are linked to categories manually.  
This leads to:

| ❌ Problem | 💥 Impact |
|-----------|----------|
| Products have options, but they are not visible in the backend | Impossible to edit them |
| Options not linked to category | They don’t appear on product pages |
| Manual linking takes hours | Huge waste of time on large stores |
| Easy to miss important characteristics | Loss of sales due to missing filters |

---

## 🛠 How This Script Fixes It

| ✅ Feature | 🚀 Benefit |
|-----------|-----------|
| Automatically finds all used product options | Zero manual work |
| Links options to their respective categories | Immediate visibility in backend |
| Keeps existing links untouched | Safe to run multiple times |
| Handles huge catalogs | Works with 100K+ products |
| Pure SQL + MODX API | Fast and reliable |
| Production-tested | Stable on live sites |

---

## ⚙️ Installation & Usage

1. Place the script in your MODX project root or `core/components/` folder.
2. Connect it in `index.php` or run via CLI:
   ``bash
   php auto-option-assigner.php
`` or use Console packet for modx, or connect modx api to file next to index.php

3. The script will:

   * Get all categories
   * Find all products inside them
   * Detect all used product options
   * Link them to the category if not already linked
4. Done ✅ — All product characteristics are now visible and editable.

---

## 📈 Results You Can Expect

After running:

* 🕒 **Hours saved** — no more manual linking
* 🔍 **All options visible** in category editing
* 📊 **Better filtering** on product listing pages
* 💻 **Immediate backend improvement** without core hacks

---

## 📌 Tech Overview

| Component     | Details                     |
| ------------- | --------------------------- |
| Language      | PHP 7+                      |
| Database      | MySQL / MariaDB             |
| CMS           | MODX Revolution             |
| Extra         | MiniShop2                   |
| Method        | SQL + MODX xPDO API         |
| Compatibility | Tested on MODX Revo 2.x–3.x |

---

## 💻 Tech Stack

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge\&logo=php\&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%234479A1.svg?style=for-the-badge\&logo=mysql\&logoColor=white)
![MODX](https://img.shields.io/badge/MODX-%2300AEEF.svg?style=for-the-badge\&logo=modx\&logoColor=white)
![MiniShop2](https://img.shields.io/badge/minishop2-%2300AEEF.svg?style=for-the-badge\&logo=modx\&logoColor=white)
![PDO](https://img.shields.io/badge/pdo-%23323330.svg?style=for-the-badge\&logo=php\&logoColor=white)
![Automation](https://img.shields.io/badge/automation-%2300C4CC.svg?style=for-the-badge\&logo=python\&logoColor=white)
![Performance](https://img.shields.io/badge/performance%20optimized-%2300A4EF.svg?style=for-the-badge\&logo=googlechrome\&logoColor=white)
![No Dependencies](https://img.shields.io/badge/no%20dependencies-%2300C4CC.svg?style=for-the-badge\&logo=php\&logoColor=white)
![CMS Plugin](https://img.shields.io/badge/cms%20plugin-%2300AEEF.svg?style=for-the-badge\&logo=modx\&logoColor=white)
![Problem Solving](https://img.shields.io/badge/problem%20solving-%23D42029.svg?style=for-the-badge\&logo=security\&logoColor=white)

---

## 📦 License

MIT — free to use, modify, and integrate in your projects.

---

### ⭐ If this script saved you hours of work, star the repository and share it with other MODX developers!
