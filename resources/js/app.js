if (
  localStorage.theme === 'dark' ||
  (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
  $('html').addClass('dark');
} else {
  $('html').removeClass('dark');
}
