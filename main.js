document.addEventListener('DOMContentLoaded', () => {
    // Define the sections for the main content
    const SectionsMain = [
        {
            imgSrc: 'https://download.scamcraft.net/img/jakobsoftlogo-ohne-schrift.png',
            imgAlt: 'Jakobsoft',
            title: 'Jakobsoft',
            description: 'Jakobsoft Software Provider',
            buttonText: 'Zur Jakobsoft Seite!',
            buttonAction: () => {
                currentSections = SectionsJakobsoft;
                renderSections(currentSections);
            },
            imgStyles: { width: '50px', height: '65px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/timemachine.png',
            imgAlt: 'Time Machine',
            title: 'Time Machine',
            description: 'Die Zeitmaschine bringt dich zu jedem Codename Zurück!',
            buttonText: 'Du Geben Zeitmaschine!',
            buttonLink: 'timemachine/',
            imgStyles: { width: '65px', height: '65px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/seatables.png',
            imgAlt: 'Seatables',
            title: '',
            description: 'Die BESTEN Sitze der WELT! (Made in China!)',
            buttonText: 'Ich Kaufe!',
            buttonAction: () => {
                currentSections = SectionsSeatables;
                renderSections(currentSections);
            },
            imgStyles: { width: '65px', height: '65px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/gratspiel-logo.png',
            imgAlt: 'Gratspiel.Virus',
            title: '',
            description: 'Die Besten Vir- Ähhh Spiele!',
            buttonText: 'Zur Gratspiel Seite!',
            buttonLink: 'gratspiel.virus',
            imgStyles: { width: '130px', height: '65px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/minecraft.png',
            imgAlt: 'Minecraft',
            title: 'Minecraft',
            description: 'Die Besten Basen, Deathchamber, Müllchamber und die Ultimative Blockade!',
            buttonText: 'Anzeigen',
            buttonLink: 'minecraft',
            buttonAction: () => {
                currentSections = SectionsMinecraft;
                renderSections(currentSections);
            },
            imgStyles: { width: '50px', height: '65px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/book.png',
            imgAlt: 'Stadtordnung',
            title: 'Stadtordnung',
            description: 'Die Regeln von MCDONELTS CITY (Die Schmeißt man ins Klo und sind NICHT zum Lesen da!)',
            buttonText: 'Leider Gratgesperrt! (Gratsperre.virus)',
            disabled: true,
            imgStyles: { width: '65px', height: '65px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/codename-kapsel-security.png',
            imgAlt: 'Codename Kapselsecurity',
            title: 'Codename Kapselsecurity',
            description: 'Der Login Für Codename Kapselsecurity!',
            buttonText: 'Zur Kapselsecurity Alpha!',
            buttonLink: 'accounts/',
            imgStyles: { width: '65px', height: '65px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/scamcraft-logo.png',
            imgAlt: 'SCAMCRAFT',
            title: 'SCAMCRAFT.NET',
            description: 'Der Beste Server Der Welt.',
            buttonText: 'Leider Gratgesperrt! (Gratsperre.virus)',
            disabled: true,
            imgStyles: { width: '65px', height: '65px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/stellar.png',
            imgAlt: 'Codename Stellarvideo',
            title: 'Codename Stellarvideo',
            description: 'Der Login Für Codename Stellarvideo!',
            buttonText: 'Zur Stellarvideo Alpha!',
            buttonLink: 'stellarvideo/',
            imgStyles: { width: '65px', height: '65px' },
            showButton: true,
        },
    ];

    // Define the sections for Jakobsoft
    const SectionsJakobsoft = [
        {
            imgSrc: '',
            imgAlt: '',
            title: 'Codename Winwows',
            description: 'Jakobsoft Codename Winwows Installer',
            buttonText: 'Winwows Installer DOWNLOAD!',
            buttonAction: () => alert('Download Fehlgeschlagen :('),
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/rickrollblocker.png',
            imgAlt: 'Rickrollblocker',
            title: 'Rickrollblocker',
            description: 'Er blockiert jeden Rickroll 100% unzuverlässig!',
            buttonText: 'Leider Gratgesperrt! (Gratsperre.virus)',
            disabled: true,
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/jakobsoft-browserlogo.png',
            imgAlt: 'Internet Erforscher',
            title: 'iErforsch (Interforsch)',
            description: 'Der Beste Browser Der Welt von Jakobsoft. Version: 2.6',
            buttonText: 'Internet Erforscher DOWNLOAD!',
            buttonLink: 'https://download.scamcraft.net/internet-erforscher/2.6.zip',
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/product-keys.png',
            imgAlt: 'Product Keys',
            title: 'Product Keys',
            description: 'Der Product Key für Das Beste Betriebsystem Winwows!',
            buttonText: 'GEBEN GLATIS!!',
            buttonAction: () => alert('KEINE GLATIS KEY HIER!!!'),
            imgStyles: { width: '50px', height: '50px' },
            showButton: true,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/jakobsoft-router.png',
            imgAlt: 'Moden',
            title: 'Moden',
            description: 'Jakobsoft J-5894 DFÜ Moden!',
            buttonText: 'Leider Gratgesperrt! (Gratsperre.virus)',
            disabled: true,
            showButton: true,
        },
    ];

    const SectionsSeatables = [
        {
            imgSrc: 'https://download.scamcraft.net/img/404.png',
            imgAlt: 'Seatables',
            title: 'SEATABLES-SEITE',
            description: 'UNDER CONSTRUCTION',
            buttonText: '!!!!!',
            buttonAction: () => alert('This feature is under construction!'),
            showButton: true,
        }
    ];
    
    const SectionsMinecraft = [
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/1.png',
            imgAlt: 'Bedwars',
            title: 'Made By: Fassade Inc.',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/2.png',
            imgAlt: 'Bedwars',
            title: 'Die Erste MÜLLBASE!',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/3.png',
            imgAlt: 'Bedwars',
            title: 'Camo Chamber!',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/4.png',
            imgAlt: 'Bedwars',
            title: 'Die Erste Müllbase',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/5.png',
            imgAlt: 'Bedwars',
            title: 'Camo Chamber!',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/6.png',
            imgAlt: 'Bedwars',
            title: 'Der Müllchamber (Besser)!',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/7.png',
            imgAlt: 'Bedwars',
            title: 'Der Mystery Hallway',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/8.png',
            imgAlt: 'Bedwars',
            title: 'Der Beste "Cooler President!"',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/9.png',
            imgAlt: 'Bedwars',
            title: 'Win? Was Das?',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
        {
            imgSrc: 'https://download.scamcraft.net/img/bedwars/10.png',
            imgAlt: 'Bedwars',
            title: 'Oha, WIN!',
            imgStyles: { width: '480px', height: '270px' },
            showButton: false,
        },
    ];

    let currentSections = SectionsMain;

    const mainContent = document.getElementById('main-content');

    // Function to render sections
    function renderSections(sections) {
        mainContent.innerHTML = ''; // Clear existing content

        sections.forEach((section) => {
            const sectionElement = document.createElement('section');

            const imgElement = document.createElement('img');
            imgElement.src = section.imgSrc;
            imgElement.alt = section.imgAlt;
            // Apply image styles from the section object
            if (section.imgStyles) {
                Object.assign(imgElement.style, section.imgStyles);
            }
            sectionElement.appendChild(imgElement);

            if (section.title) {
                const titleElement = document.createElement('h2');
                titleElement.textContent = section.title;
                sectionElement.appendChild(titleElement);
            }

            const descriptionElement = document.createElement('p');
            descriptionElement.textContent = section.description;
            sectionElement.appendChild(descriptionElement);

            if (section.showButton) {
                const buttonElement = document.createElement('button');
                buttonElement.textContent = section.buttonText;

                if (section.disabled) {
                    buttonElement.disabled = true;
                } else if (section.buttonAction) {
                    buttonElement.onclick = section.buttonAction; // Execute JavaScript function
                } else {
                    buttonElement.onclick = () => {
                        window.location.href = section.buttonLink;
                    };
                }

                sectionElement.appendChild(buttonElement);
            }

            mainContent.appendChild(sectionElement);
        });
    }

    // Initial render
    renderSections(currentSections);
});


window.onload = function() {
    var currentYear = new Date().getFullYear();
    document.getElementById('copyright-year').innerText = currentYear;
    document.getElementById('site-name-version').innerText = "Codename Kapselordnung Release v1.9 -> R0";
  };
  
  // DOM Elements
  
  const darkButton = document.getElementById('dark');
  const lightButton = document.getElementById('light');
  const solarButton = document.getElementById('solar');
  const body = document.body;
  
  
  // Apply the cached theme on reload
  
  const theme = localStorage.getItem('theme');
  const isSolar = localStorage.getItem('isSolar');
  
  if (theme) {
    body.classList.add(theme);
    isSolar && body.classList.add('solar');
    if (isSolar) {
      solarButton.innerText = "normalize";
      solarButton.style.cssText = `--bg-solar: white;`;
    }
  } else {
      body.classList.add('light');
      localStorage.setItem('theme', 'light');
  }
  
  // Button Event Handlers
  
  darkButton.onclick = () => {
    body.classList.replace('light', 'dark');
    localStorage.setItem('theme', 'dark');
  };
  
  lightButton.onclick = () => {
    body.classList.replace('dark', 'light');
  
    localStorage.setItem('theme', 'light');
  };
  
  solarButton.onclick = () => {
  
    if (body.classList.contains('solar')) {
      
      body.classList.remove('solar');
      solarButton.style.cssText = `
        --bg-solar: var(--yellow);
      `
  
      solarButton.innerText = 'solarize';
  
      localStorage.removeItem('isSolar');
  
    } else {
  
      solarButton.style.cssText = `
        --bg-solar: white;
      `
  
      body.classList.add('solar');
      solarButton.innerText = 'normalize';
  
      localStorage.setItem('isSolar', true);
    }
  };