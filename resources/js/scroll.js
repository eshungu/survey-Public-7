

export function menuScroll = function() {
    
        const navbar = document.querySelector('#navigation')

    window.addEventListener('scroll', function(e) {
    const lastPosition = window.scrollY
    if (lastPosition > 50 ) {
        navbar.classList.add('colored')
    } else if (navbar.classList.contains('colored')) {
        navbar.classList.remove('colored')
    } else {
        navbar.classList.remove('colored')
    }
    })

  }