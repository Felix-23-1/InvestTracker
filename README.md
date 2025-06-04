# 💸 Crypto Invest Tracker

Ein webbasiertes Tool zur Verwaltung, Visualisierung und Analyse deiner Krypto-Investitionen.  
Basierend auf [Laravel](https://laravel.com), mit integrierter Kursanbindung, Portfolio-Auswertung und Nachrichtenfeed.

---

## 🔍 Funktionen im Überblick

### 🧾 Investment-Übersicht & Verwaltung

- **CRUD-Funktionalität**  
  Erstelle, bearbeite und lösche deine Investitionen über ein intuitives Interface.

- **Details je Investition:**  
  - Kaufdatum  
  - Kaufpreis  
  - Menge  
  - Coin (z. B. BTC, ETH)  
  - Notizen

- **Datenbankgestützt**  
  Speicherung in einer relationalen Datenbank wie SQLite oder MySQL.

---

### 📈 Live-Kurs-Integration via CoinGecko

- Abruf aktueller Kursdaten beliebter Kryptowährungen
- Darstellung von Kursverläufen (z. B. Tages- oder Wochenentwicklung)
- Automatische Umrechnung von Einstandswerten in aktuellen Marktwert

---

### 📰 Krypto-News

- Abruf aktueller Nachrichten aus der Krypto-Welt
- Anzeige als Liste mit Weiterleitung zur Detailansicht
- Funktion basiert auf einem eigenen `NewsHelper`, der externe Newsfeeds integriert

---

### 📊 Portfolio-Tracker

- Konsolidierte Übersicht aller Investitionen
- Anzeige von:
  - Gesamtwert (aktueller Marktwert)
  - Einstandswert
  - Gewinn/Verlust (PnL)
- Grafische Darstellung in Planung (Platzhalter implementiert)

---

## ⚙️ Installation

```bash
git clone https://github.com/Felix-23-1/InvestTracker.git
cd InvestTracker
composer install
cp .env.example .env
php artisan key:generate
npm install && npm run dev
php artisan migrate
