export default class Parallax
{
    constructor()
    {
        this.setItems()
        this.setMouse()
        this.setAnimation()
    }

    setItems()
    {
        // Get elements
        const $elements = document.querySelectorAll('.js-cursor-parallax')

        this.items = new Array()

        // Set parameters
        for (const $element of $elements)
        {
            const item = {}
            item.$element = $element
            item.amplitude = parseFloat($element.dataset.amplitude)
            item.offsetX = 0
            item.offsetY = 0

            this.items.push(item)
        }
    }

    setMouse()
    {
        // Get mouse data
        this.mouse = {}
        this.mouse.x = 0
        this.mouse.y = 0

        // Get window sizes
        let windowWidth = window.innerWidth
        let windowHeight = window.innerHeight

        // Listen to resize
        window.addEventListener('resize', () =>
        {
            windowWidth = window.innerWidth
            windowHeight = window.innerHeight
        })

        // Listen to mousemove
        window.addEventListener('mousemove', (event) =>
        {
            this.mouse.x = event.clientX / windowWidth - 0.5
            this.mouse.y = event.clientY / windowHeight - 0.5
        })
    }

    setAnimation()
    {
        const loop = () =>
        {
            window.requestAnimationFrame(loop)

            // Set parallax effect
            for (const item of this.items)
            {
                const targetOffetX = - this.mouse.x * 100 * item.amplitude
                const targetOffetY = - this.mouse.y * 100 * item.amplitude

                item.offsetX += (targetOffetX - item.offsetX) * 0.05
                item.offsetY += (targetOffetY - item.offsetY) * 0.05
    
                const roundedOffsetX = Math.round(item.offsetX * 100) / 100
                const roundedOffsetY = Math.round(item.offsetY * 100) / 100

                item.$element.style.transform =
                `
                    translateX(${roundedOffsetX}px)
                    translateY(${roundedOffsetY}px)
                `
            }
        }
        loop()
    }
}