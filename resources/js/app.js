import LocomotiveScroll from 'locomotive-scroll'
import 'locomotive-scroll/dist/locomotive-scroll.css'

window.addEventListener('load', function () {
    let mainNavigation = document.getElementById('primary-navigation')
    let mainNavigationToggle = document.getElementById('primary-menu-toggle')

    if (mainNavigation && mainNavigationToggle) {
        mainNavigationToggle.addEventListener('click', function (e) {
            e.preventDefault()
            mainNavigation.classList.toggle('hidden')
        })
    }

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches

    if (!prefersReducedMotion) {
        document.querySelectorAll('main > article > section').forEach(function (section) {
            section.setAttribute('data-scroll', '')
            section.classList.add('txa-scroll-reveal')
        })

        const locomotiveScroll = new LocomotiveScroll({
            lenisOptions: {
                lerp: 0.08,
                smoothWheel: true,
                wheelMultiplier: 0.9,
            },
        })

        window.txaLocomotiveScroll = locomotiveScroll
    }
})
