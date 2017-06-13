function append_project_tag(e, appended_project_tag, project_tags)
{
    alert(project_tags);
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

    project_tags.forEach(function(project_tag){
        var option_elem = document.createElement('option');
        option_elem.value = project_tag['project_tag_id'];
        option_elem.text = project_tag['project_tag_name'];
        select_elem.appendChild(option_elem);
    });
    p_elem.appendChild(select_elem);

    // image
    a_elem = document.createElement('a');
    a_elem.setAttribute('href', '#');
    alert('append_project_tag(this, ' + String(appended_project_tag + 1) + ',' + String(project_tags) + ')');
    a_elem.onclick = new Function('append_project_tag(this, ' + String(appended_project_tag + 1) + ',' + JSON.stringify(project_tags) + ')');
    alert(appended_project_tag);

    img_elem = document.createElement('img');
    img_elem.setAttribute('src', '/images/plus.png');
    a_elem.appendChild(img_elem);
    p_elem.appendChild(a_elem);

    parent_elem.appendChild(p_elem);
}