(function () {
  var PER_PAGE = 6;
  var qs = new URLSearchParams(location.search);
  function esc(s){return String(s).replace(/[&<>"]/g,function(c){return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[c]})}

  function card(a) {
    return '<div class="col-12 col-md-6 col-lg-4 mb-4"><div class="card post-card h-100">' +
      '<a href="article.html?id=' + a.id + '"><img src="' + a.image + '" class="card-img-top" alt="' + esc(a.title) + '"></a>' +
      '<div class="card-body"><h3 class="card-title h5"><a href="article.html?id=' + a.id + '">' + esc(a.title) + '</a></h3>' +
      '<p class="card-text">' + esc(a.summary) + '</p></div>' +
      '<div class="card-footer bg-white border-0 post-date">تاریخ انتشار: ' + a.date + '</div></div></div>';
  }

  /* صفحه اصلی: آخرین مقالات */
  var latest = document.getElementById('latest-articles');
  if (latest) latest.innerHTML = ARTICLES.slice(0, 3).map(card).join('');

  /* صفحه لیست: جستجو + صفحه‌بندی */
  var list = document.getElementById('articles-list');
  if (list) {
    var q = (qs.get('q') || '').trim(), tag = qs.get('tag') || '';
    var page = Math.max(1, parseInt(qs.get('page'), 10) || 1);
    document.getElementById('search-input').value = q;
    var found = ARTICLES.filter(function (a) {
      var okQ = !q || (a.title + ' ' + a.summary).indexOf(q) > -1;
      var okT = !tag || a.tags.indexOf(tag) > -1;
      return okQ && okT;
    });
    var pages = Math.max(1, Math.ceil(found.length / PER_PAGE));
    if (page > pages) page = pages;
    var info = document.getElementById('result-info');
    info.textContent = (q || tag) ? found.length + ' مقاله یافت شد' + (tag ? ' با برچسب «' + tag + '»' : '') : '';
    list.innerHTML = found.length
      ? found.slice((page - 1) * PER_PAGE, page * PER_PAGE).map(card).join('')
      : '<div class="col-12"><div class="alert alert-warning">مقاله‌ای پیدا نشد. عبارت دیگری را جستجو کنید.</div></div>';

    function link(p) {
      var u = 'articles.html?page=' + p + (q ? '&q=' + encodeURIComponent(q) : '') + (tag ? '&tag=' + encodeURIComponent(tag) : '');
      return u;
    }
    var h = '<li class="page-item' + (page === 1 ? ' disabled' : '') + '"><a class="page-link" href="' + link(page - 1) + '">قبلی</a></li>';
    for (var i = 1; i <= pages; i++)
      h += '<li class="page-item' + (i === page ? ' active' : '') + '"><a class="page-link" href="' + link(i) + '">' + i + '</a></li>';
    h += '<li class="page-item' + (page === pages ? ' disabled' : '') + '"><a class="page-link" href="' + link(page + 1) + '">بعدی</a></li>';
    document.getElementById('pagination').innerHTML = h;
  }

  /* صفحه مقاله */
  var box = document.getElementById('article-box');
  if (box) {
    var id = parseInt(qs.get('id'), 10) || 1;
    var a = ARTICLES.filter(function (x) { return x.id === id; })[0] || ARTICLES[0];
    document.title = a.title;
    document.getElementById('crumb-title').textContent = a.title;
    box.innerHTML = '<h1 class="h3 font-weight-bold mb-2">' + esc(a.title) + '</h1>' +
      '<div class="post-date mb-3">تاریخ انتشار: ' + a.date + '</div>' +
      '<img class="cover mb-4" src="' + a.image + '" alt="' + esc(a.title) + '">' +
      '<div class="article-content">' + a.content + '</div><hr>' +
      '<div><strong>برچسب‌ها:</strong> ' + a.tags.map(function (t) {
        return '<a class="tag" href="articles.html?tag=' + encodeURIComponent(t) + '">' + esc(t) + '</a>';
      }).join('') + '</div>';
  }
})();
