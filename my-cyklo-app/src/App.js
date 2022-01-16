import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import Cards from './components/Cards';
import Radio from './components/Radio';
import Texts from './components/Texts';
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Selection from './components/Selection';
import FormNumber from './components/FormNumber';
import Sum from './components/Sum';
import bikeR from './bikeR.jpg';
import bikeM from './bikeM.jpg';
import bikeK from './bikeK.jpg';
import bikeG from './bikeG.jpg';

import React, { Component } from 'react'
import Email from './components/Email';

export default class App extends Component {

  constructor(props) {
    super(props);

    this.state = {
      email:"",
      valNum: 0,
      holderVal:0,
      numberOfBorrowing:5,
      avaiableBikes: [
        {
          key: 1,
          value: "Dětské kolo",
          price: 200,
          classes: "col-xs-11 col-sm-9 col-md-5 col-lg-3 pt-3",
          src: bikeK,
          count:0,
        },
        {
          key: 2,
          value:"Horské kolo",
          price: 500,
          classes: "col-xs-11 col-sm-9 col-md-5 col-lg-3 pt-3",
          src: bikeM,
          count:0,

        },
        {
          key: 3,
          value:"Silniční kolo",
          price: 1500,
          classes: "col-xs-11 col-sm-9 col-md-5 col-lg-3 pt-3",
          src: bikeR,
          count:0,

        },
        {
          key: 4,
          value:"Gravel",
          price: 2500,
          classes: "col-xs-11 col-sm-9 col-md-5 col-lg-3 pt-3",
          src: bikeG,
          count:0,
        },
      ],
      holders: [
        {
          key:1,
          tit:"cyklonosič střešní (+ 5% z celkové ceny zápůjčky navíc)",
          value:0.05,
          isChecked:false,
        },
        {
          key:2,
          tit:"cyklonosič na tažné zařízení (+ 10% z celkové ceny zápůjčky navíc)",
          value: 0.10,
          isChecked:false,
        },
        {
          key:3,
          tit:"není třeba cyklonosič",
          value: 0,
          isChecked:false,
        },
      ]
    };
  }

  handlePicturePrice = (number) => {
    this.setState({ valNum: number});
  };

  handleCountBikes = (bike) => {
    this.setState((state)=>{ 
      return{
        avaiableBikes: state.avaiableBikes.map((originalBike)=>
        originalBike===bike ? {...bike, count: bike.count+1}:originalBike,
        ),
      };
    });
  };

  handleHolderSelectionChange = (origHolder) => {
    this.setState((state)=>{
      return {
        holderVal: origHolder.value,
        holders: state.holders.map((holder) =>
          holder === origHolder
            ? { ...holder, isChecked: !holder.isChecked } 
            : { ...holder, isChecked: false }
        ),
      };
    });
  };

  handleOnSelectChange=(num)=>{
    this.setState({numberOfBorrowing: num})
  }

  handleChangeEmail=(event)=>{
    this.setState({email: event.target.value})
  }

  handleOnClickEmail=()=>{
    if(this.state.email.includes("@")){
      this.setState(this.baseState);
    alert(
      `Vaše objednávka za ${this.calculateTotalPrice()},- kč byla odeslána. `
    );
  }else{
    alert(
      `Zadali jste špatný formát emailu objednávka nebyla odeslána! `
    );

  }
}

  changeComparison=(number,totalPrice)=>{
    let sentence="";
    sentence=(number-totalPrice)>=0 ? "Vaše představa odpovídá požadavku!":"Vaše představa je nereálná!"
    return sentence

  }
  calculateTotalPrice=()=>{
    let total=0;
    this.state.avaiableBikes.map((bike)=>
      total+=(bike.count*bike.price*this.state.numberOfBorrowing)*(this.state.holderVal+1)
    )
    return Math.round(total)
  }
  render(){
  return (
    <div className="App py-5">
      <Container className="Cover">
        <h1 className="py-4">Kolosalon</h1>
        <Row className="justify-content-center">
          {this.state.avaiableBikes.map((bike)=>(
            <Cards
              key={bike.key}
              bike={bike}
              onClick={this.handleCountBikes}/>
          ))}
        </Row>
        <Container className="info my-4">
        <Row className="justify-content-center">
          <div className="col-xs-11 col-sm-9 col-md-5 col-lg-3 pt-3">
            <h4>Vybraná kola:</h4>
            {this.state.avaiableBikes.map((bike)=>(
            <Texts 
                key={bike.key}
                count={bike.count}
                name={bike.value}/>
            ))}
          </div>
            <FormNumber num={this.state.valNum} 
                        comparison={this.changeComparison(this.state.valNum,this.calculateTotalPrice())}
                        onInputChange={this.handlePicturePrice} 
                        classes="col-xs-11 col-sm-9 col-md-5 col-lg-3 py-3"/>
           <div className="col-xs-11 col-sm-9 col-md-5 col-lg-3 py-3">
              <h4>Je libo cyklonosič?</h4>
              {this.state.holders.map((holder)=>(
                  <Radio 
                    tit={holder.tit}
                    key={holder.key}
                    holder={holder}
                    value={holder.value}
                    checked={holder.isChecked}
                    onChange={this.handleHolderSelectionChange}
                  />
              ))}
           </div>
            <Selection onChange={this.handleOnSelectChange}/>
          </Row>
          <Row className="justify-content-center justify-content-lg-start">
            <div className="col-xs-12 col-sm-9 col-md-10 col-lg-3 py-3">
            <h4 className="text-info">Celková cena:</h4>
            <Sum total={this.calculateTotalPrice()}/>
            </div>
            <div className="col-xs-12 col-sm-9 col-md-10 col-lg-6 py-3">
            <Email onClick={this.handleOnClickEmail} value={this.state.email} onChange={this.handleChangeEmail}/>
            </div>
          </Row>
        </Container>
      </Container>
      </div>
  );
  }
}