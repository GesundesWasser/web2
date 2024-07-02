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
            imgSrc: 'https://download.scamcraft.net/img/404.png',
            imgAlt: 'Seatables',
            title: 'JAKOBSOFT-SEITE',
            description: 'UNDER CONSTRUCTION',
            buttonText: '!!!!!',
            buttonAction: () => alert('This feature is under construction!'), // JavaScript code to run
            showButton: true,
        }
    ];

    const SectionsSeatables = [
        {
            imgSrc: 'https://download.scamcraft.net/img/404.png',
            imgAlt: 'Seatables',
            title: 'SEATABLES-SEITE',
            description: 'UNDER CONSTRUCTION',
            buttonText: '!!!!!',
            buttonAction: () => alert('This feature is under construction!'), // JavaScript code to run
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