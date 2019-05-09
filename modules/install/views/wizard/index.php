
<p style="font-size:120%;font-weight: bold;">Welcome to the Wizard Behavior Demo</p>

<p>Wizard Behavior is an extension for the Yii PHP Framework that simplifies the handling of multi-step forms. It features data persistence, Plot-Branching Navigation (PBN), step repetition, Forward Only navigation, optional step timeout, invalid step handling, pause and restart between sessions, and has utility methods for use in views to assist navigation; the demos below demonstrate these features.</p>

<div id="demos">
<h2>The Demos</h2>
<ul>
<li><a href="/wizard/registration">Registration Wizard&nbsp;&raquo;</a><p>A Four step registration wizard.</p><p>You can return to previous steps either using the "Previous" button or the menu; note that $autoAdvance===TRUE, so if you go back two steps the "Next" button goes to the first uncompleted step.</p><p>You can save your registration by clicking the Save button, and then resume it later by going to the provided URL.</p></li>
</ul>
<p><b>Note:</b> No data is stored on completion of the Wizards; they either display what you have entered, or in the case of the quiz, how well you did.</p>
</div>

