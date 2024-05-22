$(document).ready(function() {
    function filterItems() {
        var search_text = $('#filter-search').val().toLowerCase();
        $('.filter-item').each(function() {
            var item_name = $(this).find('label').text().toLowerCase();
            var input_checked = $(this).find('input').is(":checked")

            if (!input_checked && item_name.includes(search_text)) { // to enter this condition, the field shouldn't be already checked
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    function handleCheckboxClick() {
        var selected_filters_div = $('#selected-filters');
        selected_filters_div.empty();
        
        $('.filter-item input:checked').each(function() {
            var label = $(this).next('label').text();
            var id = $(this).val();
            var selected_filter = $('<div class="selected-filter mt-2" data-id="' + id + '">' + label + ' <a href="#" class="btn btn-primary btn-xs remove-filter float-right " data-id="' + id + '">X Clear</a></div>');
            
            selected_filters_div.append(selected_filter);
            $(this).closest('.filter-item').hide();
        });

        // if there are selected filters, we show the clear button
        // if (selected_filters_div.children().length > 0) {
            
        //     var clear_button = $('<button class="btn btn-primary btn-sm mt-2" id="clear-filters">X Clear</button>');
        //     selected_filters_div.append(clear_button);
        // }
    }

    // $('#filter-search').on('keyup', filterItems);
    $('#filter-search').on('keypress', function(e) {
        if (e.which === 13) { // Enter key
            e.preventDefault();
            filterItems();
        }
    });
    
    $('#search-button').on('click', function() {
        filterItems();
    });

    $(document).on('change', '.filter-item input', function() {
        handleCheckboxClick();
    });

    $(document).on('click', '.remove-filter', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('.filter-item input[value="' + id + '"]').prop('checked', false).closest('.filter-item').show();
        $(this).parent().remove();

        var selected_filters_div = $('#selected-filters').find('.selected-filter');

        // remove clear button if there are no selected filters
        // if (selected_filters_div.children().length === 0) {
        //     $('#clear-filters').remove();
        // }
    });

    $(document).on('click', '#clear-filters', function() {
        $('.filter-item input:checked').prop('checked', false).closest('.filter-item').show();
        $('#selected-filters').empty();
    });

     // Toggle arrow based on collapsed or expanded for content format
     $('#contentFormatsCollapse').on('show.bs.collapse', function () {
        $('#contentFormatsArrow').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }).on('hide.bs.collapse', function () {
        $('#contentFormatsArrow').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    });

    // Toggle arrow based on collapsed or expanded for solution
    $('#solutionCollapse').on('show.bs.collapse', function () {
        $('#solutionArrow').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }).on('hide.bs.collapse', function () {
        $('#solutionArrow').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    });

    handleCheckboxClick(); // Initialize selected filters display on page load

    // function handleImageError(img) {
    //     $(img).hide();
    //     $(img).siblings('.fallback-icon').show();
    // }
});