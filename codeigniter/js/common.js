function append_project_tag(e, appended_project_tag)
{
    // dropdown
    var parent_elem = e.parentElement;
    while (parent_elem.className != "project_tag_board")
    {
        parent_elem = parent_elem.parentElement;
    }
    // p1にproject_tag_boardのElementを追加する
    var p_elem = document.createElement('p');

    var select_elem = document.createElement('select')
    select_elem.name = "project_tag_id" + String(appended_project_tag);

    var option_elem = document.createElement('option');
    option_elem.value = '""';
    select_elem.appendChild(option_elem);
    p_elem.appendChild(select_elem);

    // image
    img_elem = document.createElement('img');
    img_elem.setAttribute('src', '/images/plus.png');
    p_elem.appendChild(img_elem);

    parent_elem.appendChild(p_elem);    
}