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

            // Show all cards for now (you can add filtering logic later if needed)
            courseCards.forEach(card => {
                card.parentElement.style.display = 'block';
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

        // Handle Generate button
        // document.querySelector('.btn-generate').addEventListener('click', function(e) {
        //     e.preventDefault();
        //     const textarea = document.querySelector('textarea[name="content"]');
        //     console.log('Generating with content:', textarea.value);
        //     // Add your generation logic here
        // });

        // // Handle Do Nothing button
        // document.querySelector('.btn-do-nothing').addEventListener('click', function() {
        //     console.log('Do nothing button clicked');
        // });
