//
//  ContentView.swift
//  CheckInVN2
//
//  Created by PPPP on 14/01/2023.
//

import SwiftUI

struct ContentView: View {
    
    var body: some View {
        VStack(alignment: .leading) {
            Text("Turtle Rook")
                .font(/*@START_MENU_TOKEN@*/.title/*@END_MENU_TOKEN@*/)
            HStack {
                Text("Joshua Tree National Park")
                .font(.subheadline)
                 Spacer()
                Text("California")
                .font(.subheadline)
            }
        }
        .padding()
    }
}
struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
