window.axios = require("axios");
var lozad = require('lozad');
import gsap from 'gsap'
import { ScrollTrigger, ScrollToPlugin } from 'gsap/all'
import {setupTypewriter} from "../functions";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

const observer = lozad();
observer.observe();

const sectionsCallback = [
    (i, panel)=>{},
    (i, panel) => {
        let helloAboutText = panel.querySelector(".about-block__hello-text");
        let mainAboutText = panel.querySelector(".about-block__main-text");
        let technologyText = panel.querySelector(".stack-logotypes__text");
        if (helloAboutText !== null) {
            if (helloAboutText.style.opacity === 0 || helloAboutText.style.opacity === "") {
                helloAboutText.style.opacity = 1;
                setupTypewriter(helloAboutText).type();
            }

        }
        if (mainAboutText !== null) {
            if (mainAboutText.style.opacity === 0 || mainAboutText.style.opacity === "") {
                mainAboutText.style.opacity = 1;
                setupTypewriter(mainAboutText).type();
            }
        }

        if (technologyText !== null) {
            if (technologyText.style.opacity === 0 || technologyText.style.opacity === "") {
                technologyText.style.opacity = 1;
                setupTypewriter(technologyText).type();
            }
        }

        let logoBlock = document.querySelector(".stack-logotypes");
        if (logoBlock !== null) {
            if (!logoBlock.classList.contains("animate__fadeInUpBig")) {
                logoBlock.classList.add("animate__fadeInUpBig");
                logoBlock.style.visibility = "visible";
            }
        }
    },
    (i, panel) => {

    },
    (i, panel) => {

    }
]

let panels = gsap.utils.toArray(".scrollable-panel"),
    scrollTween;

function goToSection(i, panel) {
    scrollTween = gsap.to(window, {
        scrollTo: {x: 0, y: i * innerHeight, autoKill: false},
        duration: 2,
        onComplete: () => {
            sectionsCallback[i](i, panel);

            scrollTween = null
        },
        overwrite: true
    });
}
try {
    panels.forEach((panel, i) => {
        ScrollTrigger.create({
            trigger: panel,
            start: "top bottom",
            end: "+=200%",
            onToggle: self => self.isActive && !scrollTween && goToSection(i, panel)
        });
    });

    ScrollTrigger.create({
        start: 0,
        end: "max",
        snap: 1 / (panels.length - 1)
    })

} catch(e) {}
