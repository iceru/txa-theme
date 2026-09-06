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

    document.querySelectorAll('[data-destinations-toggle]').forEach(function (toggle) {
        const submenuId = toggle.getAttribute('aria-controls')
        const submenu = submenuId ? document.getElementById(submenuId) : null
        const icon = toggle.querySelector('.bi')

        if (!submenu) return

        toggle.addEventListener('click', function () {
            const isOpen = toggle.getAttribute('aria-expanded') === 'true'

            toggle.setAttribute('aria-expanded', isOpen ? 'false' : 'true')
            submenu.classList.toggle('hidden', isOpen)
            submenu.classList.toggle('lg:invisible', isOpen)
            submenu.classList.toggle('lg:opacity-0', isOpen)
            icon?.classList.toggle('rotate-180', !isOpen)
        })
    })

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches

    document.querySelectorAll('[data-hero-slider]').forEach(function (slider) {
        const images = Array.from(slider.querySelectorAll('[data-hero-slide-image]'))
        const dots = Array.from(slider.querySelectorAll('[data-hero-slide-dot]'))
        const previous = slider.querySelector('[data-hero-slide-prev]')
        const next = slider.querySelector('[data-hero-slide-next]')
        let activeIndex = 0
        let intervalId

        if (!images.length || !dots.length || images.length !== dots.length) return

        function setActiveSlide(index) {
            activeIndex = (index + images.length) % images.length
            images.forEach(function (image, imageIndex) {
                image.classList.toggle('opacity-100', imageIndex === activeIndex)
                image.classList.toggle('opacity-0', imageIndex !== activeIndex)
            })
            dots.forEach(function (dot, dotIndex) {
                dot.classList.toggle('w-7', dotIndex === activeIndex)
                dot.classList.toggle('w-2.5', dotIndex !== activeIndex)
                dot.classList.toggle('bg-brand', dotIndex === activeIndex)
                dot.classList.toggle('bg-near-black/30', dotIndex !== activeIndex)
                dot.setAttribute('aria-pressed', dotIndex === activeIndex ? 'true' : 'false')
            })
        }

        function restartAutoplay() {
            if (prefersReducedMotion) return
            window.clearInterval(intervalId)
            intervalId = window.setInterval(function () { setActiveSlide(activeIndex + 1) }, 6000)
        }

        dots.forEach(function (dot, index) {
            dot.addEventListener('click', function () { setActiveSlide(index); restartAutoplay() })
        })
        if (previous) previous.addEventListener('click', function () { setActiveSlide(activeIndex - 1); restartAutoplay() })
        if (next) next.addEventListener('click', function () { setActiveSlide(activeIndex + 1); restartAutoplay() })
        restartAutoplay()
    })

    document.querySelectorAll('[data-txa-network]').forEach(function (network) {
        const nodes = Array.from(network.querySelectorAll('[data-node]'))
        const paths = Array.from(network.querySelectorAll('[data-path]'))
        const txaNode = network.querySelector('[data-node="txa"]')
        const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches

        function clearNetwork() {
            nodes.forEach(function (node) { node.classList.remove('is-active') })
            paths.forEach(function (path) { path.classList.remove('is-active') })
        }

        function activateNetwork(node) {
            clearNetwork()
            const type = node.dataset.node
            node.classList.add('is-active')
            paths.forEach(function (path) {
                if (path.dataset.path === type || type === 'txa') path.classList.add('is-active')
            })
        }

        if (txaNode && canHover) {
            network.addEventListener('mouseenter', function () { activateNetwork(txaNode) })
            network.addEventListener('mouseleave', clearNetwork)
        }

        nodes.forEach(function (node) {
            node.addEventListener('mouseenter', function () { activateNetwork(node) })
            node.addEventListener('mouseleave', function () {
                if (txaNode && canHover && network.matches(':hover')) {
                    activateNetwork(txaNode)
                    return
                }

                clearNetwork()
            })
            node.addEventListener('focusin', function () { activateNetwork(node) })
            node.addEventListener('focusout', clearNetwork)
        })
    })

    if (!prefersReducedMotion) {
        document.querySelectorAll('main > article > section').forEach(function (section) {
            section.setAttribute('data-scroll', '')
            section.classList.add('txa-scroll-reveal')
        })
        const locomotiveScroll = new LocomotiveScroll({
            lenisOptions: { lerp: 0.08, smoothWheel: true, wheelMultiplier: 0.9 },
        })
        window.txaLocomotiveScroll = locomotiveScroll
    }
})
