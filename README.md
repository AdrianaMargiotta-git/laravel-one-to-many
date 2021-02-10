<strong><i>laravel-one-to-many</i></strong>

<hr>

<p>Definire migration, model, factory e seeder per le seguenti entità:</p>
<ul>
<li>employee: name, lastname, dateOfBirth</li>
<li>task: title, description, priority (valore intero da 1 a 5)</li>
<li>Typlogies: name, description</li>
</ul>

<p>Dopo aver creato tabelle, aggiunto relazioni, inserito dati fake, produrre le index e le show di ogni entità.</p>

<p>La relazione tra task e employee è di tipo 1aN (uno a molti) quindi: un employee esegue piu' task, un task e' eseguito da un unico employee</p>

<p>La relazione tra task e typologies è di tipo NaM (molti a molti).</p>

<p>Aggiungere la validazione a fronte di ogni inserimento (create & update), cercando di testare i vari controlli che avete a disposizione a partire dalla documentazione vista in classe.</p>