<div class="login">
    <form action="php/log.php" method="POST">
        <label for="username">Gebruikersnaam:</label>
        <input type="username" name="username" placeholder="Type hier.." required>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" placeholder="Type hier.." required>
        <input type="submit" value="log In" name="submit">
    </form>
    <div class="registratie-1">
        <h2>Heb je geen account? Registreer nu!</h2>
        <button class="btn-1"><a href="index.php?page=registratie">Registreer nu</a></button>
        <button class="btn-2"><a href="index.php?page=tv">Ga Terug</a></button>
    </div>
</div>