# Suleyman Macit's Portfolio and Blog

A responsive personal portfolio website that gives recruiters and visitors one place to learn about my background, education, skills, and projects. It also includes a simple blog system, allowing an authenticated user to draft, preview, publish, and organise posts for visitors to read.

## Key Features

- A multi-page personal portfolio with Home, Education, Skills, Portfolio, and Blog pages.
- Responsive layouts that adapt navigation, grids, forms, tables, and post controls for smaller screens.
- Contact links for email, GitHub, and LinkedIn.
- Session-based login and logout behaviour that changes the navigation and protects the post-creation area.
- Blog post creation with title and body validation in both the browser and on the server.
- A preview workflow that keeps an unfinished title and post body in the user session so they can edit before publishing.
- MySQL-backed blog storage with timestamps and newest-first post ordering.
- A month archive filter to show posts from a selected month.
- A portfolio entry linking to my Java **Double or Quit Quiz** miniproject documentation.

## Tech Stack & Architecture

### Tech Stack

- **PHP** - server-side page rendering, sessions, redirects, validation, and database operations.
- **MySQL** - stores user records and published blog posts.
- **MySQLi** - connects PHP to the MySQL database.
- **HTML5** - semantic page and form structure.
- **CSS3** - page-specific styling, CSS Grid layouts, and a shared mobile media query.
- **JavaScript** - immediate blog-form validation and a confirmation step before clearing a draft.
- **Google Fonts** - Ubuntu and Google Sans typography.

### Architecture

This is a small server-rendered PHP application with a clear separation of responsibilities. Public pages such as `index.php`, `education.php`, `skills.php`, and `portfolio.php` display portfolio information, while the blog feature is split into focused routes: `loginProcess.php` authenticates a user, `addEntry.php` shows the protected editor, `previewPost.php` holds a temporary preview, `addPost.php` publishes the post, and `viewBlog.php` retrieves and filters published posts.

`dbconnect.php` centralises the MySQL connection settings. Each main page loads its own focused stylesheet, while `reset.css` provides consistent browser defaults and `responsive.css` contains the shared mobile rules. Data moves from HTML forms to PHP, then to MySQL, and is encoded with `htmlspecialchars()` before it is displayed back in the browser.

## Why I Built This & What I Learned

I built this project to move beyond a static portfolio and practise how a real website can manage user state and stored content. As a first-year Computer Science student, I wanted to combine the HTML/CSS skills used to present information with PHP, JavaScript, and MySQL to solve a practical problem: keeping my portfolio personal while making the blog updateable.

The project taught me how sessions can represent a logged-in user and preserve a draft between pages, why validation should happen in more than one place, and how redirects keep users moving through a predictable workflow. I also practised breaking a larger feature into smaller files with one main job each, using CSS Grid for responsive layouts, handling data from forms, and writing a simple insertion-sort routine to control the order in which posts appear.

## How It Works (Under the Hood)

1. A visitor can read every portfolio page and the published blog without logging in.
2. When the owner submits the login form, `loginProcess.php` checks the supplied details against the `users` table. A successful match stores the user's ID and email in the PHP session.
3. The session unlocks `addEntry.php`; unauthenticated visitors are redirected to the login page. JavaScript highlights any blank title or body field before submission, while PHP repeats the empty-field check on the server.
4. Choosing **Preview Blog** sends the draft to `previewPost.php`, which saves the title and body in the session and renders a safe preview. Choosing **Edit Post** returns the saved draft to the form.
5. Choosing **Post Blog** sends the draft to `addPost.php`, which trims and escapes the input, adds a timestamp, and inserts the post into the `blog_posts` table. The draft session data is then cleared.
6. `viewBlog.php` loads all posts, uses insertion sort to order them from newest to oldest, builds a list of available months, and filters the results when a visitor selects an archive month.
7. Before titles and post bodies are rendered, `htmlspecialchars()` encodes their HTML-sensitive characters and `nl2br()` keeps the author's line breaks readable.

## Getting Started

### Prerequisites

- PHP 8 or later with the `mysqli` extension enabled.
- MySQL running locally.
- A MySQL database named `smacit_phase2` containing the `users` and `blog_posts` tables expected by the PHP files.

There are no Composer, npm, or other package-manager dependencies in this repository. Before running the site, update the connection settings in `dbconnect.php` to match your local MySQL account if they differ from the current local development setup.

### Run Locally

From the project root, start PHP's built-in development server:

```powershell
php -S localhost:8000
```

Then open [http://localhost:8000/index.php](http://localhost:8000/index.php) in a browser. The public portfolio and blog can be viewed immediately; use a record already present in the `users` table to access the blog editor.
