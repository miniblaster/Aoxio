
<script>
  document.querySelector("#switch_theme_style").addEventListener("click", event => {
    let theme_style = document.querySelector('body[data-theme-style]').getAttribute('data-theme-style');
    let new_theme_style = theme_style == 'light' ? 'dark' : 'light';
    let css = document.querySelector(`#css_theme_style`);

    document.querySelector(`body[data-theme-style]`).setAttribute('data-theme-style', new_theme_style);

    switch(new_theme_style) {
        case 'dark':
            css.setAttribute('href', <?= json_encode(base_url() . 'assets/css/bootstrap-dark.min.css') ?>);
            document.body.classList.add('c_darkmode');
            break;

        case 'light':
            css.setAttribute('href', <?= json_encode(base_url() . 'assets/css/bootstrap.min.css') ?>);
            document.body.classList.remove('c_darkmode');
            break;
    }

    document.querySelectorAll('[data-logo]').forEach(element => {
        let new_brand_value = element.getAttribute(`data-${new_theme_style}-value`);
        let new_brand_class = element.getAttribute(`data-${new_theme_style}-class`);
        let new_brand_html = (new_brand_value.includes('http://') || new_brand_value.includes('https://')) ? `<img src="${new_brand_value}" class="${new_brand_class}" alt="logo-alt" />` : `<span class="${new_brand_class}">${new_brand_value}</span>`;
        element.innerHTML = new_brand_html;
    });


    document.querySelector(`#switch_theme_style`).setAttribute('data-original-title', document.querySelector(`#switch_theme_style`).getAttribute(`data-title-theme-style-${theme_style}`));
    document.querySelector(`#switch_theme_style [data-theme-style="${new_theme_style}"]`).classList.remove('d-none');
    document.querySelector(`#switch_theme_style [data-theme-style="${theme_style}"]`).classList.add('d-none');

    event.preventDefault();
  })
</script>