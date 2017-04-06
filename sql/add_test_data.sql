-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Player (name, password) VALUES ('velho', 'salainen');
INSERT INTO Player (name, password) VALUES ('noita', 'salainen');

INSERT INTO Spell (name, type, school, level, components, castingtime, range, effect, targets, duration, savingthrow, spellresistance, description) VALUES('Magic Missile', 'Arcane', 'Evocation [Force]', 1, 'V, S', '1 Standard Action', 'Medium (100 ft. + 10 ft./level)', '', 'Up to five creatures, no two of which can be more than 15 ft. apart', 'Instantaneous', 'None', 'Yes', ' A missile of magical energy darts forth from your fingertip and strikes its target, dealing 1d4+1 points of force damage.

The missile strikes unerringly, even if the target is in melee combat or has less than total cover or total concealment. Specific parts of a creature can’t be singled out. Inanimate objects are not damaged by the spell.

For every two caster levels beyond 1st, you gain an additional missile—two at 3rd level, three at 5th, four at 7th, and the maximum of five missiles at 9th level or higher. If you shoot multiple missiles, you can have them strike a single creature or several creatures. A single missile can strike only one creature. You must designate targets before you check for spell resistance or roll damage.
');
