jQuery(document).ready(function () {
    var items = [];

    for (var i = 1; i <= 255; i++) {
        var item = {
            src: 'himg/img (' + i + ').jpg',
            srct: 'imglow/img (' + i + ').jpg',
            title: 'Image ' + i
        };

        items.push(item);
    }
    jQuery("#nanogallery2").nanogallery2({
        
        thumbnailHeight:  450,
        thumbnailWidth:   450,
        itemsBaseURL:     'images/images/',
        viewerTools: {
            topLeft: 'label, closeButton',
            topRight: 'downloadButton',
            items: {
                label: {
                    position: 'top'
                }, 
                closeButton: {
                    title: 'Close',
                    click: function(nanogallery) {
                        nanogallery.closeViewer();
                    }
                },
                downloadButton: {
                    title: 'Download',
                    click: function(nanogallery, itemData) {
                        var downloadLink = document.createElement('a');
                        downloadLink.href = itemData.srct;
                        downloadLink.download = itemData.title;
                        downloadLink.target = '_blank';
                        downloadLink.click();
                    }
                }
            }
        },
        
        items: items
    });
});
