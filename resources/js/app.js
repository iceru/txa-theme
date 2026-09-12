import LocomotiveScroll from 'locomotive-scroll'
import 'locomotive-scroll/dist/locomotive-scroll.css'

window.addEventListener('load', function () {
    let mainNavigation = document.getElementById('primary-navigation')
    let mainNavigationToggle = document.getElementById('primary-menu-toggle')
    let mainNavigationClose = document.getElementById('primary-menu-close')
    let mainNavigationOverlay = document.getElementById('primary-navigation-overlay')

    if (mainNavigation && mainNavigationToggle && mainNavigationOverlay) {
        const openNavigation = function () {
            mainNavigation.classList.remove('translate-x-full')
            mainNavigation.classList.add('translate-x-0')
            mainNavigationOverlay.classList.remove('pointer-events-none', 'opacity-0')
            mainNavigationOverlay.classList.add('opacity-100')
            mainNavigationToggle.setAttribute('aria-expanded', 'true')
            mainNavigationToggle.setAttribute('aria-label', 'Close navigation')
            document.body.classList.add('overflow-hidden')
        }

        const closeNavigation = function () {
            mainNavigation.classList.remove('translate-x-0')
            mainNavigation.classList.add('translate-x-full')
            mainNavigationOverlay.classList.remove('opacity-100')
            mainNavigationOverlay.classList.add('pointer-events-none', 'opacity-0')
            mainNavigationToggle.setAttribute('aria-expanded', 'false')
            mainNavigationToggle.setAttribute('aria-label', 'Open navigation')
            document.body.classList.remove('overflow-hidden')
        }

        mainNavigationToggle.addEventListener('click', function (e) {
            e.preventDefault()
            const isOpen = mainNavigationToggle.getAttribute('aria-expanded') === 'true'
            isOpen ? closeNavigation() : openNavigation()
        })

        mainNavigationOverlay.addEventListener('click', closeNavigation)
        mainNavigationClose?.addEventListener('click', closeNavigation)

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && mainNavigationToggle.getAttribute('aria-expanded') === 'true') {
                closeNavigation()
                mainNavigationToggle.focus()
            }
        })

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1024 && mainNavigationToggle.getAttribute('aria-expanded') === 'true') {
                closeNavigation()
            }
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

        document.addEventListener('click', function (event) {
            if (toggle.contains(event.target) || submenu.contains(event.target)) return

            toggle.setAttribute('aria-expanded', 'false')
            submenu.classList.add('hidden', 'lg:invisible', 'lg:opacity-0')
            icon?.classList.remove('rotate-180')
        })

        document.addEventListener('keydown', function (event) {
            if (event.key !== 'Escape' || toggle.getAttribute('aria-expanded') !== 'true') return

            toggle.setAttribute('aria-expanded', 'false')
            submenu.classList.add('hidden', 'lg:invisible', 'lg:opacity-0')
            icon?.classList.remove('rotate-180')
            toggle.focus()
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

            if (type === 'txa') {
                paths.forEach(function (path) { path.classList.add('is-active') })
                return
            }

            paths.forEach(function (path) {
                const pathTypes = (path.dataset.path || '').split(/\s+/)
                if (pathTypes.includes(type)) path.classList.add('is-active')
            })
        }

        if (txaNode && canHover) {
            network.addEventListener('mouseenter', function () { activateNetwork(txaNode) })
            network.addEventListener('mouseleave', clearNetwork)
        }

        nodes.forEach(function (node) {
            node.addEventListener('mouseenter', function () { activateNetwork(node) })
            node.addEventListener('mouseleave', function () {
                const hoveredNode = nodes.slice().reverse().find(function (candidate) {
                    return candidate !== node && candidate.matches(':hover')
                })

                if (hoveredNode) {
                    activateNetwork(hoveredNode)
                    return
                }

                if (txaNode && canHover && network.matches(':hover')) {
                    activateNetwork(txaNode)
                    return
                }

                clearNetwork()
            })
            node.addEventListener('focusin', function (event) {
                if (event.target === node) activateNetwork(node)
            })
            node.addEventListener('focusout', function (event) {
                if (event.target === node) clearNetwork()
            })
        })
    })

    document.querySelectorAll('[data-faq-card]').forEach(function (faq) {
        faq.addEventListener('click', function (event) {
            if (event.target.closest('summary, a, button, input, select, textarea')) return

            faq.open = !faq.open
        })

        faq.addEventListener('toggle', function () {
            if (!faq.open) return

            const group = faq.closest('[data-faq-group]')
            if (!group) return

            group.querySelectorAll('[data-faq-card][open]').forEach(function (openFaq) {
                if (openFaq !== faq) openFaq.open = false
            })
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
