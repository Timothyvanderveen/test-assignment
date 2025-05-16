# Test Assignment Setup

## 🚀 Installation

1. **Clone the repository**

**SSH**

```bash
git clone git@github.com:Timothyvanderveen/test-assignment.git
```

**HTTPS**

```bash
git clone https://github.com/Timothyvanderveen/test-assignment.git
```

2. **Navigate to the project directory**

```bash
cd test-assignment
```

3. **Set up environment variables**

```bash
cp .env.example .env
echo -e "APP_ENV=dev\nAPP_SECRET=yeet" > .env
```

4. **Install Composer dependencies**

```bash
composer install
```

5. **Start the server**

```bash
composer start
```

> 🛠 This custom script builds Tailwind, stops any running services, and starts the web server at **127.0.0.1:8080**.

## 📌 Aanpak

Ik begon met het weer bekend worden met Symfony / Twig en het opzetten van PHPstan (leveltje 10) en CS fixer.  
Test homepage aangemaakt, wat door de config files gekeken, de directory structuur opdelen in Modules en wat routing
heen en weer.

Toen verdiept in Tailwind. Ik kende het, maar nooit mee gewerkt. Eerste wat ik deed was themes/global variabelen voor
colours en fonts aanmaken.  
Even nagedacht over of ik volledig Tailwind ga, of toch wat basis styling zet op bijv html en wat reusable classes.  
Uiteindelijk voor volledig tailwind gekozen.

Vervolgens begonnen met het design nabouwen met hardcoded values (en placekitten.com thumbnails uiteraard).  
Dit heb ik gedaan door het design in 3 components op te delen. Dat maakt eventuele reusability makkelijker.  
Header, sidebar en result list.  
Dit heb ik opgelost met de [Twig component bundle](https://symfony.com/bundles/ux-twig-component/current/index.html).  
Het liefst wilde ik de [live components](https://symfony.com/bundles/ux-live-component/current/index.html) gebruiken om
de resultaten dynamisch te maken, maar dat leek me iets te ambitieus voor een test opdracht.  
Heb de resultaten pagina wel wat responsive gemaakt.

Zodra het design klaar was begon ik aan de data uit het JSON bestand halen.  
Ik wilde losjes een api/orm constructie nabouwen.  
Daadwerkelijke API calls heb ik achterwege gelaten, aangezien de frontend niet reactive is.  
Daarom de data uit een "Repository" gehaald en meegegeven aan de controller.  
Ik heb de hele structuur misschien ietwat overengineered, maar dat heb ik voornamelijk voor mezelf gedaan om weer bekend
te worden met de stof.

**De flow is als volgt:**  
request data uit een "RepositoryService" → creëer een "EntityCollection" → lees de json uit obv de dataJsonPath → map de
data naar "Entity's" → filter de EntityCollection data → return de data in de response.  
De rest is simpel frontend werk.  
Ik heb de flow zo strak mogelijk gemaakt qua typing. Een achtergrond in TypeScript hielp hier verrassend veel bij (ik
heb in het verleden het meest gewerkt met PHP 5 en oppervlakkige PHPdoc).

Ik heb wat dingen achterwege gelaten, omdat het te finicky is en verder niet heel spannend is.  
Bijvoorbeeld dropdowns, doorlinken, sign in, reactive design, een uitgebeid(er) API client en pagination.  
Mocht dat nog toegevoegd moeten worden hoor ik het wel.

Ook heb ik natuurlijk AI gebruikt, maar dat was eigenlijk alleen maar voor het vertalen van JS/Vue/TS patterns in TS,
boilerplate code of een mooie readme maken.

Uiteraard ben ik (nog) niet erg bekend met Symfony/PHP practices en patterns, dus zal vast wel wat dingen op
gekke/omslachtige/verouderde manieren gedaan hebben.  
Maar ik hoop dat ik laten zien heb dat ik dat allemaal kan leren.

Ik hoop dat dit voldoende is zo xoxo
