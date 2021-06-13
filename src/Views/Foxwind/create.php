<?php
ob_start();
?>
    <section id="createArticle">
        <!-- Titre de la section -->
        <h1 class="h3 mb-0 text-gray-800">Créer un article</h1>
        <hr>


        <form action="/article/create" method="POST" enctype="multipart/form-data">
            <label for="title" class="h3 mb-0 text-gray-800">Titre de votre article</label><br>
            <input id="title" value="<?= old("title")?>" required type="text" name="title" aria-label="Titre de l'article" placeholder="Titre de l'article"/>
            <p class="error"><?= error("title")?></p>
            <hr>

            <label for="img" class="h3 mb-0 text-gray-800">Image d'illustration</label><br>
            <input id="file" required type="file" aria-label="Image principal de l'article"/>
            <div class="articleBlock">
                <div class="background-picture"></div>
                <h2>/////////////////</h2>
                <div id="separator"></div>
                <p>/////////////////</p>
                <a href="/article/1" class="button">En savoir plus</a>
                <div class="rond rond-inv" id="rondInv2"></div>
                <div class="rond rond-inv" id="rondInv3"></div>
            </div>
            <p class="error"><?= error("img")?></p>
            <hr>
            <img id="blah" src="#" alt="your image" />

            <label for="intro" class="h3 mb-0 text-gray-800">introduction de votre article</label><br>
            <textarea id="intro" required aria-label="Introduction de l'article" placeholder="Introduction de l'article" name="intro"><?= old("intro")?></textarea>
            <p class="error"><?= error("intro")?></p>
            <hr>
            <div class="editor" style="min-height: 250px">
            </div>
            <button type="submit" class="full-button-green">Créer l'article</button>
        </form>
    </section>
    <script>
        let fileElem = $(`#file`)[0];
        $(`#file`).on("change", () => {
            if (fileElem.files && fileElem.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result).width(150).height(200);
                };
                reader.readAsDataURL(fileElem.files[0]);
            }
        })
        let quill = new Quill('.editor', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    ['link', 'image'],

                    ['clean']
                ]
            }
        });
        $('form').on("submit", (e) => {
            e.preventDefault();
            let content = $(`.ql-editor`).html();
            let file_data = $('#file').prop('files')[0];
            let fd = new FormData();
            fd.append('file', file_data);
            fd.append('content', content);
            $.ajax({
                url: '/api/article/create', // <-- point to server-side PHP script
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: fd,
                type: 'post',
                success: function(php_script_response){
                    console.log(php_script_response)
                }
            });
        })
        var cpt = 0;
        var main = document.getElementById("c");
        function newSection(e){
            e.preventDefault();
            let type = document.getElementById("new").value;
            console.log(type);

            if (cpt<3) {
                if (type!="") {
                    cpt++;
                }
                if (type=="left") {

                    let hid = document.createElement("input");
                    hid.setAttribute("type","hidden")
                    hid.setAttribute("name","type"+cpt)
                    hid.value = "left";

                    let b = document.createElement("button");
                    b.setAttribute("class","full-button-green");
                    b.innerHTML = "Supprimer";
                    b.addEventListener("click",(event)=>{
                        event.preventDefault();
                        event.target.parentElement.remove()
                        cpt--;
                    });

                    let dimg = document.createElement("div");
                    let dt = document.createElement("div");
                    let sec = document.createElement("div");
                    sec.setAttribute("class","left")

                    let img = document.createElement("input");
                    let limg = document.createElement("label")
                    img.setAttribute("type","file");
                    img.setAttribute("name","img"+cpt);
                    img.setAttribute("id","img"+cpt);
                    limg.setAttribute('for','img'+cpt);
                    limg.innerHTML = "Image de la section : "

                    dimg.appendChild(limg);
                    dimg.appendChild(img);

                    let t = document.createElement("textarea");
                    let lt = document.createElement("label")
                    t.setAttribute("id","t"+cpt);
                    t.setAttribute("name","t"+cpt);
                    lt.setAttribute('for','t'+cpt);
                    lt.innerHTML = "Texte de la section :";

                    dt.appendChild(lt);
                    dt.appendChild(t);


                    sec.appendChild(dimg);
                    sec.appendChild(dt);
                    sec.appendChild(b);
                    sec.appendChild(hid)

                    main.appendChild(sec);
                }else if(type=="right"){

                    let hid = document.createElement("input");
                    hid.setAttribute("type","hidden")
                    hid.setAttribute("name","type"+cpt)
                    hid.value = "right";

                    let b = document.createElement("button");
                    b.setAttribute("class","full-button-green");
                    b.innerHTML = "Supprimer";
                    b.addEventListener("click",(event)=>{
                        event.preventDefault();
                        event.target.parentElement.remove()
                        cpt--;
                    });

                    let dimg = document.createElement("div");
                    let dt = document.createElement("div");
                    let sec = document.createElement("div");
                    sec.setAttribute("class","right")

                    let img = document.createElement("input");
                    let limg = document.createElement("label")
                    img.setAttribute("type","file");
                    img.setAttribute("name","img"+cpt);
                    img.setAttribute("id","img"+cpt);
                    limg.setAttribute('for','img'+cpt);
                    limg.innerHTML = "Image de la section :"

                    dimg.appendChild(limg);
                    dimg.appendChild(img);

                    let t = document.createElement("textarea");
                    let lt = document.createElement("label")
                    t.setAttribute("id","t"+cpt);
                    t.setAttribute("name","t"+cpt);
                    lt.setAttribute('for','t'+cpt);
                    lt.innerHTML = "Texte de la section :";

                    dt.appendChild(lt);
                    dt.appendChild(t);


                    sec.appendChild(dt);
                    sec.appendChild(dimg);
                    sec.appendChild(b);
                    sec.appendChild(hid)

                    main.appendChild(sec);

                }else if(type=="no"){
                    let hid = document.createElement("input");
                    hid.setAttribute("type","hidden")
                    hid.setAttribute("name","type"+cpt)
                    hid.value = "center";

                    let b = document.createElement("button");
                    b.setAttribute("class","full-button-green");
                    b.innerHTML = "Supprimer";
                    b.addEventListener("click",(event)=>{
                        event.preventDefault();
                        event.target.parentElement.remove()
                        cpt--;
                    });

                    let dt = document.createElement("div");
                    let sec = document.createElement("div");
                    sec.setAttribute("class","right")

                    let t = document.createElement("textarea");
                    let lt = document.createElement("label")
                    t.setAttribute("id","t"+cpt);
                    t.setAttribute("name","t"+cpt);
                    lt.setAttribute('for','t'+cpt);
                    lt.innerHTML = "Texte de la section :";

                    dt.appendChild(lt);
                    dt.appendChild(t);

                    sec.appendChild(dt);
                    sec.appendChild(b);
                    sec.appendChild(hid)

                    main.appendChild(sec);

                }
            }
        }
    </script>


<?php
$description = 'Bienvenue sur FoxWind ';
$title = 'Article';
$style = '
<link rel="stylesheet" href="/resources/style/create/create.css">
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
<script src="/resources/js/image-resize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="/resources/style/blog/blog.css">';
$content = ob_get_clean();

require VIEWS . '/FoxWind/Back/layout.php';
