function showMore(id) {
    const moreInfo = document.getElementById(id);
    const isVisible = moreInfo.style.display === 'block';

    // Hide all sections first
    const allMoreInfo = document.querySelectorAll('.more-info');
    allMoreInfo.forEach(info => info.style.display = 'none');

    // Toggle visibility of the clicked section
    moreInfo.style.display = isVisible ? 'none' : 'block';
}
