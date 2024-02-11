describe('Footer', () => {
    beforeEach(() => {
        cy.visit("http://localhost:3000/");
      
    });
  
    it('displays company information', () => {
      cy.get('.footer-content__1').should('exist');
      
  
      cy.contains('CAR Rental').should('exist');
      cy.contains('We offers a big range of vehicles for all your driving needs. We have the perfect car to meet your needs.').should('exist');
      cy.contains('(123) -456-789').should('exist');
      cy.contains('carrental@gmail.com').should('exist');
      cy.contains('Design by XpeedStudio').should('exist');
    });
  
    it('navigates to external link', () => {
      cy.get('.footer-content__1 a[href="https://xpeedstudio.com/"]').should('exist');
      cy.get('.footer-content__1 a[href="https://xpeedstudio.com/"]').should('have.attr', 'target', '_blank');
      cy.get('.footer-content__1 a[href="https://xpeedstudio.com/"]').should('have.attr', 'rel', 'noreferrer');
    });
    
    it('displays working hours', () => {
      cy.get('.footer-content__2 li').contains('Working Hours').should('exist');
      cy.get('.footer-content__2 li').contains('Mon - Fri: 9:00AM - 9:00PM').should('exist');
      cy.get('.footer-content__2 li').contains('Sat: 9:00AM - 19:00PM').should('exist');
      cy.get('.footer-content__2 li').contains('Sun: Closed').should('exist');
    });
  
    it('handles subscription form', () => {
      cy.get('.footer-content__2 li').contains('Subscription').should('exist');
      cy.get('.footer-content__2 input[type="email"]').should('exist');
      cy.get('.footer-content__2 button.submit-email').should('exist');
    });
  });
  