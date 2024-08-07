
const panels = document.querySelectorAll('.panel');

panels.forEach(panel => {
  panel.addEventListener('click', evt => {
    panels.forEach(p => {
      if (p === panel) {
        p.classList.add('active');
      } else {
        p.classList.remove('active');
      }
    });
  });
});

