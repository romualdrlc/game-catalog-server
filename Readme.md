### Mariadb creation database

```bash
CREATE DATABASE game_catalog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'symfony'@'localhost' IDENTIFIED BY 'motdepassefort';
GRANT ALL PRIVILEGES ON game_catalog.* TO 'symfony'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Lancement en mode http pour contrer le probleme de cors : symfony serve --no-tls

📦 Plan de boîtier (externe)
En MDF 18 mm (épaisseur classique)

csharp
Copier
Hauteur (H) = 50 cm
Largeur (L) = 28 cm
Profondeur (P) = 26 cm
Volume brut ≈ 50 × 28 × 26 = 36 400 cm³ ≈ 36.4 L

En enlevant l'épaisseur du bois + HP, on reste avec ~33–34 L net → OK.

🌀 Calcul de l’évent (bass reflex)
Nous allons accorder chaque chambre à 55 Hz, bien pour du grave propre.

Volume : 18 L

Tube : diamètre interne 6 cm (standard PVC, facilement trouvable)

Nombre : 1 par chambre

🔢 Longueur du tube (calculée avec accord à 55 Hz) :

👉 ≈ 14.5 cm de long (pour Ø 6 cm)

Si tu veux un évent rectangulaire ou intégré, je peux recalculer.

Voici la vue "explosée" :

bash
Copier
Vue de face (chaque face de 28 × 50 cm)

[ Tweeter Ø21cm centré à 12 cm du haut ]
[ Medium/Basse Ø21cm centré à 35 cm du haut ]

→ Mêmes découpes pour la face arrière

→ Panneau haut : 28 × 26 cm
→ Panneau bas : 28 × 26 cm
→ Panneaux latéraux : 50 × 26 cm
→ Face avant/arrière : 50 × 28 cm

→ Event circulaire Ø6cm au dos à 10 cm du bas (par chambre)

🧰 Liste de découpe (MDF 18 mm)
Pièce Dimensions (cm) Qté
Face avant 50 × 28 1
Face arrière 50 × 28 1
Côtés 50 × 26 2
Haut & bas 28 × 26 2
Cloison centrale 28 × 26 1 (pour séparer G/D)

🧩 Étapes de fabrication
Découpe du bois MDF.

Perçage des trous de HP (Ø 21 cm) et évents (Ø 6 cm).

Assemblage au bois + colle + vis ou serre-joint.

Pose mousse acoustique interne.

Montage des HP + connecteurs + électronique.

Test avant fermeture finale.

Finition : peinture, vernis ou placage.
