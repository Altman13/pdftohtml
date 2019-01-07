    {foreach from=$page_num item=foo key=key}
            {$foo.page}
    {/foreach}
    <ul class="pagination offset-md-2" style="padding-top: 10px;">
        <li class="page-item"><a class="page-link" href="#">Назад</a></li>
        {foreach from=$page_num item=foo key=key}
        {*{for $foo=1 to count(key)}*}
        {/foreach}
        {for $foo=1 to 10}
            <li class="page-item"><a class="page-link" href="#">{$foo}</a></li>
        {/for}
        <li class="page-item"><a class="page-link" href="#">Вперед</a></li>
    </ul>
