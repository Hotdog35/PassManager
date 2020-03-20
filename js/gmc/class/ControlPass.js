class ControlPass{

	constructor(){
		this._link = document.querySelector('#linkArea');
		this._pass = document.querySelector('#passArea');
		this._goal = document.querySelector('#goalArea');
		this._login = document.querySelector('#loginArea');

		this._alterLink;
		this._alterPass;
		this._alterGoal;
		this._alterLogin;

		this._alterId ="";
		this._alterLinkEntry = document.querySelector('#alterLinkArea');
		this._alterLoginEntry = document.querySelector('#alterLoginArea');
		this._alterPassEntry = document.querySelector('#alterPassArea');
		this._alterGoalEntry = document.querySelector('#alterGoalArea');


		this._nameRegister = "";
		this._lastNameRegister = "";
		this._loginRegister = "";
		this._passRegister = "";
		this._departRegister = "";

	}
	


	showAlterEntry(condiction){

		let value = document.querySelector('#alterRegister');
		
		if(condiction){
			value.classList.add('show');
		}else{
			value.classList.remove('show');
		}
	}


	showEntry(condiction){
		
		let value = document.querySelector('#areaRegister');
		
		if(condiction){
			value.classList.add('show');
		}else{
			value.classList.remove('show');
		}
		
	

	}


	alterPut(cont,module_1){


		switch(module_1){

				case 1:
					this._alterLink = document.querySelector('#alterLink');
					this._alterLogin = document.querySelector('#alterLog');
					this._alterGoal = document.querySelector('#alterGoal');
					this._alterPass = document.querySelector('#alterPass');


		}


		this._alterLink.value = document.querySelector('#altLink'+cont).innerHTML;
		this._alterLogin.value = document.querySelector('#altLog'+cont).innerHTML;
		this._alterGoal.value = document.querySelector('#altGoal'+cont).innerHTML;
		this._alterPass.value = document.querySelector('#altPass'+cont).innerHTML;
		this._alterId = document.querySelector('#alterId'+cont).innerHTML;



	}

	alterPutValues(modal){

		this._alterLinkEntry.innerHTML = this._alterLink.value;
		this._alterLoginEntry.innerHTML = this._alterLogin.value;
		this._alterGoalEntry.innerHTML = this._alterGoal.value;
		this._alterPassEntry.innerHTML = this._alterPass.value;

		$(modal).modal('hide');
		this.showAlterEntry(true);
	}

	putValues(modal){

		this._link.innerHTML = document.querySelector('#linkValue').value;
		this._login.innerHTML = document.querySelector('#loginValue').value;
		this._goal.innerHTML = document.querySelector('#goalValue').value;
		this._pass.innerHTML = document.querySelector('#passValue').value;

		$(modal).modal('hide');
		this.showEntry(true);
	}

	setUsers(){
		this._nameRegister = document.querySelector('#name').value;
		this._lastNameRegister = document.querySelector('#lastname').value;
		this._loginRegister = document.querySelector('#login').value;
		this._passRegister = document.querySelector('#pass').value;
		this._departRegister = document.querySelector('#dp').value;
	}

	cancelEntry(){
		this._link.innerHTML = "";
		this._login.innerHTML = "";
		this._goal.innerHTML = "";
		this._pass.innerHTML = "";
		this.showEntry(false);

		this._alterLinkEntry.innerHTML = "";
		this._alterLoginEntry.innerHTML = "";
		this._alterGoalEntry.innerHTML = "";
		this._alterPassEntry.innerHTML = "";
		this.showAlterEntry(false);
	}



	saveEntry(id){
		if(id == 1){
			document.location = "php/actions/register.php?link="+this._link.innerHTML+"&login="+this._login.innerHTML+"&goal="+this._goal.innerHTML+"&pass="+this._pass.innerHTML;
		}else
			document.location = "php/actions/registerdp.php?link="+this._link.innerHTML+"&login="+this._login.innerHTML+"&goal="+this._goal.innerHTML+"&pass="+this._pass.innerHTML;
	}

	alterEntry(id){
		if(id == 1)
			document.location = "php/actions/alter.php?link="+this._alterLinkEntry.innerHTML+"&login="+this._alterLoginEntry.innerHTML+"&goal="+this._alterGoalEntry.innerHTML+"&pass="+this._alterPassEntry.innerHTML+"&id="+this._alterId;
		else
			document.location = "php/actions/alterdp.php?link="+this._alterLinkEntry.innerHTML+"&login="+this._alterLoginEntry.innerHTML+"&goal="+this._alterGoalEntry.innerHTML+"&pass="+this._alterPassEntry.innerHTML+"&id="+this._alterId;
	}

	userRegister(){
		this.setUsers();
		document.location ="php/actions/userRegister.php?name="+this._nameRegister+"&&lastname="+this._lastNameRegister+"&&login="+this._loginRegister+"&&pass="+this._passRegister+"&&department="+this._departRegister;
	}

}