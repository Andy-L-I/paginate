jQuery.fn.paginate = function (options) {
    var params = $.extend({
            template: '',
            render: function (template, data) {
                return template;
            },
            loadMoreBtn: $()
        }, options),
        loadMoreBtn = params.loadMoreBtn,
        page = loadMoreBtn.data('page'),
        perPage = loadMoreBtn.data('perPage'),
        loadSrc = loadMoreBtn.data('src'),
        render = params.render,
        template = params.template,
        bufferPage = null,
        content = this,
        isEnd = false;

    function renderPage(data) {
        var contentHtml = '';

        data.entities.forEach(function (item) {
            contentHtml += render(template, item);
        });

        return contentHtml;
    }

    function loadPage(cb) {
        loadMoreBtn.prop('disabled', true);

        if (isEnd) {
            cb(null, true);

            return;
        }

        $.getJSON(
            loadSrc,
            {
                page: page
            },
            function (res) {
                if (page * perPage >= res.total) {
                    isEnd = true;
                }

                page += 1;

                cb(res);

                loadMoreBtn.prop('disabled', false);
            }
        );
    }

    function appendContent(data) {
        content.append(renderPage(data));
    }

    function paginate () {
        function saveBuffer() {
            loadPage(function (data, isEnd) {
                if (isEnd) {
                    loadMoreBtn.hide();
                    return;
                }

                bufferPage = data;
            });
        }

        if (bufferPage) {
            appendContent(bufferPage);

            saveBuffer();
        } else {
            loadPage(function (data) {
                appendContent(data);

                saveBuffer();
            });
        }
    }
    params.loadMoreBtn.click(paginate);

};