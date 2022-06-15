@include('layouts.app')



<body>
    <div class="container-fluid border border-primary" style="height: 100vh;">
        <div class="row h-100 w-100">
            <div class="col-md-6  mt-5">
                <div class="form-group">
                    <label>Titre du Rapport</label>
                    <input type="text" class="form-control w-75" placeholder="Titre du Rapport" data-type="h1">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label>Nom du réponsable</label>

                    <input type="text" class="form-control w-75" id="exampleInputPassword1" placeholder="Password" data-type="h4">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <label>Contenu du Rapport</label>
                <div class="form-group">
                <textarea cols="30" rows="10" class="form-group w-75" data-type="p">
                </textarea>
            </div>
        </div>
        <div class="col-md-6 mt-5" id="content">  
            <h1>Titre du Rapport</h1>
            <h4 class="text-primary">Nom du réponsable</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam architecto ipsum quo magni cumque sequi quidem quasi sit laudantium laborum ex, rerum repellat alias, quibusdam sunt! Nesciunt quas corrupti ex!</p>
            <button type=" submit" class="test mt-3 btn btn-primary" id="exportBtn">Exporter en pdf</button>
            </div>
        </div>
    </div>
    <form>

    </form>





</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const inputs = Array.from(document.querySelectorAll("input"));
    inputs.push(document.querySelector("textarea"));
    inputs.forEach(input => {
        input.addEventListener("keypress", (e) => {
            if (event.key === "Enter") {
        
                document.querySelector(e.target.dataset.type).textContent = e.target.value
            }
        })
    })

    document.querySelector("#exportBtn").addEventListener("click", (e)=> {
        const el = document.querySelector("#content");
        html2pdf().from(el).save();
    })

</script>

</html>
