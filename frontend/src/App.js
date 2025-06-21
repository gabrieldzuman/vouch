import React, { useState } from 'react';
import './App.css';
import Countdown from './components/Countdown';
import TodoList from './components/TodoList';

function App() {
  const [darkMode, setDarkMode] = useState(false);

  const toggleDarkMode = () => {
    setDarkMode(!darkMode);
  };

  return (
    <div className={darkMode ? 'app dark' : 'app'}>
      <header>
        <h1>Fullstack - Vouch Soluções</h1>
        <button onClick={toggleDarkMode}>
          {darkMode ? 'Claro' : 'Escuro'}
        </button>
      </header>

      <main>
        <section className="hero">
          <h2>Bem-vindo à Landing Page</h2>
          <img src="https://source.unsplash.com/600x300/?technology" alt="Tecnologia" />
          <Countdown />
        </section>

        <section className="todo-section">
          <h2> Lista de Tarefas</h2>
          <TodoList />
        </section>
      </main>

      <footer>
        <p>© 2025 Fullstack - Vouch Soluções</p>
      </footer>
    </div>
  );
}

export default App;
