var currentAnimation = null;

document.querySelector('#username').addEventListener('focus', function () {
  handleAnimation(0, 700, 'easeOutQuart');
});

document.querySelector('#password').addEventListener('focus', function () {
  handleAnimation(-336, 700, 'easeOutQuart');
});

document.querySelector('#submit').addEventListener('focus', function () {
  handleAnimation(-730, 700, 'easeOutQuart');
});

function handleAnimation(offset, duration, easing) {
  if (currentAnimation) currentAnimation.pause();
  currentAnimation = anime({
    targets: 'path',
    strokeDashoffset: {
      value: offset,
      duration: duration,
      easing: easing
    },
    strokeDasharray: {
      value: '240 1386',
      duration: duration,
      easing: easing
    }
  });
}
