<?php 
    if(isset( $_POST['add'])){addUser();}

    function modalAdd()
    {
    echo'
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary w-25" data-toggle="modal" data-target="#myModal">Ajouter un compte</button>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                        <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Ajouter un nouveau compte</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body p-5">
                                <form action="$url" method="post" class="">
                                    <div class="">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" name="nom" required>
                                    </div>

                                    <div class="">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control" name="prenom" required>
                                    </div>

                                    <div class="">
                                        <label for="sexe">Genre</label>
                                        <select name="genre" class="form-control" id="">
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                    </div>

                                    <div class="">
                                        <label for="tel">Numéro de téléphone</label>
                                        <input type="number" class="form-control" name="tel" required>
                                    </div>

                                    <div class="">
                                        <label for="email">Adresse électronique</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>

                                    <div>
                                        <label for="type">Type</label>
                                        <select name="type" class="form-control" id="">
                                            <option value="mng">Manager</option>
                                            <option value="int">stagiaire</option>
                                        </select>
                                    </div>

                                    <div class="mt-3 mx-auto" style="width: 100px">
                                        <input type="submit" name="add" class="btn btn-primary" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
    }
?>