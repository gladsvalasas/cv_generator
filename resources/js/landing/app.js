var lozad = require('lozad');
import gsap from 'gsap'
import { ScrollTrigger, ScrollToPlugin } from 'gsap/all'
import {setupTypewriter} from "../functions";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

const observer = lozad();
observer.observe();

let panels = gsap.utils.toArray(".scrollable-panel"),
    scrollTween;

function goToSection(i, panel) {
    scrollTween = gsap.to(window, {
        scrollTo: {x: 0, y: i * innerHeight, autoKill: false},
        duration: 2,
        onComplete: () => {
            let helloAboutText = panel.querySelector(".about-block__hello-text");
            let mainAboutText = panel.querySelector(".about-block__main-text");
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
