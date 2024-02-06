describe('template spec', () => {
  beforeEach(() => {
    // Common setup code
    cy.visit('http://localhost:3000/');


  });
  it('home rendering', () => {
    cy.visit('http://localhost:3000/')
    cy.contains('Book Ride').click() 
    //book ride
    //Select car
    cy.get('select#Select-Your-Car-Type').select('Toyota Camry');
    //Select pickup
    cy.get('select#Pick-up').select('Nis');
    //select dropof
    cy.get('select#Drop-of').select('Belgrade');
    //select date
    cy.get('input#picktime').type('2021-05-05');
    //drop time
    cy.get('input#droptime').type('2021-10-05');
    //search book
    cy.contains('Search').click();
  });
  it('book ride', () => {
    cy.visit('http://localhost:3000/')
    cy.contains('Book Ride').click() 
    //book ride
    //Select car
    cy.get('select#Select-Your-Car-Type').select('Toyota Camry');
    //Select pickup
    cy.get('select#Pick-up').select('Nis');
    //select dropof
    cy.get('select#Drop-of').select('Belgrade');
    //select date
    cy.get('input#picktime').type('2021-05-05');
    //drop time
    cy.get('input#droptime').type('2021-10-05');
    //search book
    cy.contains('Search').click();
      cy.get('.booking-modal') // replace with the actual selector for your modal
      .should('be.visible') // Check if the modal is visible
      .contains('Toyota Camry') // Check if the modal contains the text

      cy.get('h6').contains('Pick-Up Location').should('be.visible');
      cy.get('p').contains('Nis').should('be.visible');
      cy.get('h6').contains('Drop-Off Location').should('be.visible');
      cy.get('p').contains('Belgrade').should('be.visible');

    //complete reservation information
    cy.get('input[placeholder="Enter your first name"]').type("Aute et consequatur");
    cy.get('input[placeholder="Enter your first name"]').should('have.value', "Aute et consequatur");

    cy.get('input[placeholder="Enter your last name"]').type("Aute et consequatur");
    cy.get('input[placeholder="Enter your last name"]').should('have.value', "Aute et consequatur");

    cy.get('input[placeholder="Enter your phone number"]').type("Aute et consequatur");
    cy.get('input[placeholder="Enter your first name"]').should('have.value', "Aute et consequatur");
    
    cy.get('input[placeholder="18"]').type("Aute et consequatur");
    cy.get('input[placeholder="18"]').should('have.value', "");
    cy.get('input[placeholder="18"]').type("20");


    cy.get('input[placeholder="Enter your email address"]').type("Aute et consequatur");
    /* cy.get('input[placeholder="Enter your email address"]').should('have.value', ""); */

    cy.get('input[placeholder="Enter your street address"]').type("Aute et consequatur");
    cy.get('input[placeholder="Enter your street address"]').should('have.value', "Aute et consequatur");

    cy.get('input[placeholder="Enter your city"]').type("Aute et consequatur");
    cy.get('input[placeholder="Enter your city"]').should('have.value', "Aute et consequatur");

    cy.get('input[placeholder="Enter your zip code"]').type("1234");
    cy.get('input[placeholder="Enter your zip code"]').should('have.value', "1234");





  })
})

