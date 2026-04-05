// Filter functionality
function initializeFilters() {
    const filterTags = document.querySelectorAll('.filter-tag');
    const courseCards = document.querySelectorAll('.course-card');

    filterTags.forEach(tag => {
        tag.addEventListener('click', function() {
            // Remove active class from all tags
            filterTags.forEach(t => t.classList.remove('active'));
            // Add active class to clicked tag
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');

            // Filter cards
            courseCards.forEach(card => {
                if (filterValue === 'all') {
                    card.style.display = 'block';
                } else {
                    const badge = card.querySelector('.course-badge').textContent.trim();
                    card.style.display = badge.includes(filterValue) ? 'block' : 'none';
                }
            });
        });
    });
}

// Pagination functionality
function initializePagination() {
    const pageLinks = document.querySelectorAll('.pagination .page-link');

    pageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            if (this.parentElement.classList.contains('disabled')) {
                return;
            }

            // Remove active class from all items
            document.querySelectorAll('.pagination .page-item.active').forEach(item => {
                item.classList.remove('active');
            });

            // Add active class to clicked item
            this.parentElement.classList.add('active');
        });
    });
}

// Search functionality
function initializeSearch() {
    const searchBtn = document.querySelector('.search-btn');
    const searchInput = document.querySelector('.search-input');

    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', function() {
            const searchTerm = searchInput.value.toLowerCase();
            console.log('Searching for:', searchTerm);
            // Add your search logic here
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });
    }
}

// Initialize all functionality when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initializeFilters();
    initializePagination();
    initializeSearch();
});
