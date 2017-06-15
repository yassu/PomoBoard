function append_project_tag(e, project_tag_id, project_tags)
{
    // dropdown
    var parent_elem = e.parentElement;
    while (parent_elem.className != "project_tag_board")
    {
        parent_elem = parent_elem.parentElement;
    }

    parent_elem.appendChild(get_project_tag_p_elem(project_tag_id, project_tags));
}


function get_project_tag_p_elem(project_tag_id, project_tags)
{
    // p1にproject_tag_boardのElementを追加する
    var p_elem = document.createElement('p');

    var select_elem = document.createElement('select')
    select_elem.name = "project_tag_id" + String(project_tag_id);

    project_tags.forEach(
        function (project_tag) {
            var option_elem = document.createElement('option');
            option_elem.value = project_tag['project_tag_id'];
            option_elem.text = project_tag['project_tag_name'];
            select_elem.appendChild(option_elem);
        }
    );
    p_elem.appendChild(select_elem);

    // image
    a_elem = document.createElement('a');
    a_elem.setAttribute('href', '#');
    a_elem.onclick = new Function('append_project_tag(this, ' + String(project_tag_id + 1) + ',' + JSON.stringify(project_tags) + ')');

    img_elem = document.createElement('img');
    img_elem.setAttribute('src', '/images/plus-circle.png');
    a_elem.appendChild(img_elem);
    p_elem.appendChild(a_elem);
    
    return p_elem;
}