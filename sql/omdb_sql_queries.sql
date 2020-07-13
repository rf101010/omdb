-- Jed 
-- Query 1) Get all the movies and their trivia (so that we can show this information in a table). Return NULL if the trivia doesn’t exist for a movie. This ensures that we show movies in UI with blanks for the trivia.

SELECT movies.movie_id, native_name, movie_trivia_id, movie_trivia_name FROM movies LEFT OUTER JOIN movie_trivia ON movies.movie_id = movie_trivia.movie_id

--  Jonathan, Query 2)


--  Mel, Query 3)


--  Reynold, Query 4)


--  Ryan, Query 5)


--  Samantha, Query 6)


-- (All), Query 33)
-- Connect all the tables from “movies” perspective; You should show ALL movies. Show NULLs if there is no corresponding movie_data or media or songs or people

--Working so far for the first two lines
SELECT movies.movie_id, native_name, english_name, year_made, tag_line, language, country, genre, plot FROM movies LEFT OUTER JOIN movie_data ON movies.movie_id = movie_data.movie_id

-- Need to add all the COUNTs