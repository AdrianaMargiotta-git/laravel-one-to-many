laravel-one-to-many

GOAL: definire migration, model, factory e seeder per le seguenti entita':
- employee: name, lastname, dateOfBirth
- task: title, description, priority (valore intero da 1 a 5)
Dopo aver creato tabelle, aggiunto relazioni, inserito dati fake, produrre le due index (per le due entita') come visto a lezione.
OPZIONALE: provare a fare le altre funzioni di CRUD sulle due entita', come visto in classe (evitando delete)
NOTA: la relazione e' tipo 1aN (uno-a-molti), ma dovete pensare autonomamente in che direzione e' la relazione e quindi dove sta la chiave esterna: un employee esegue piu' task, un task e' eseguito da un unico employee