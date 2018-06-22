import React from 'react';
import ReactDom from 'react-dom';

export default class Create extends React.Component{
	
	constructor(){
		super();
		this.state={
			name:'',
			email:'',
			password:''
		};
	}

	handleNameChange(e){
		this.setState({
			name:e.target.value
		})
	}


	handleEmailChange(e){
		this.setState({
			email:e.target.value
		})
	}

	handlePasswordChange(e){
		this.setState({
			password:e.target.value
		})
	}

	handleChange(e){
		e.preventDefault();
		console.log(this.state);
		axios.post('/api/users',this.state).then((response)=>{
			console.log(response);
		});
	}

	render() {
		return(
			<div>
				<h2>Add New User</h2>
				<form className="form-horizontal" onSubmit={this.handleChange.bind(this)}>
					<div className="form-group">
						<label className="control-label col-sm-2" htmlFor="">Name:</label>
						<div className="col-sm-10">
							<input className="form-control" type="text" name="name" value={this.state.name} onChange={this.handleNameChange.bind(this)}/>
						</div>
					</div>
					<div className="form-group">
						<label className="control-label col-sm-2" htmlFor="">Email:</label>
						<div className="col-sm-10">
							<input className="form-control" type="text" name="email" value={this.state.email} onChange={this.handleEmailChange.bind(this)}/>
						</div>
					</div>
					<div className="form-group">
						<label className="control-label col-sm-2" htmlFor="">Password:</label>
						<div className="col-sm-10">
							<input className="form-control" type="password" name="password" value={this.state.password} onChange={this.handlePasswordChange.bind(this)}/>
						</div>
					</div>
					<div className="form-group">
						<div className="col-sm-offset-2 col-sm-10">
							<button className="btn btn-default" type="submit">Save</button>
						</div>
					</div>
				</form>
			</div>
		);
	}
}

if (document.getElementById('create')) {
    ReactDom.render(<Create />, document.getElementById('create'));
}


